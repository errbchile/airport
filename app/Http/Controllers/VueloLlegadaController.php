<?php

namespace App\Http\Controllers;

use Auth;
use App\Airport;
use App\Airplane;
use App\AirplaneHora;
use App\AirplanePieza;
use App\Notification;
use App\Piloto;
use App\PilotoHora;
use App\PilotoSaldo;
use App\Region;
use App\User;
use App\Vuelo;
use App\VueloCobro;
use App\VueloLlegada;
use App\VueloUser;
use Illuminate\Http\Request;

class VueloLlegadaController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
    	$current_user = Auth::user()->id;
        $vuelos = Vuelo::where('status',3)
        ->whereHas('users', function($query) use ($current_user) {
	        $query->where([
	        	['user_id',$current_user],
	        	['rol',1]
	        ]);
	    })
        ->get();
        return view('vuelos.llegadas.index', ['vuelos'=>$vuelos]);
    }

    public function create($id)
    {
    	$current_user = Auth::user()->id;
        $vuelo = Vuelo::find($id);
        $piloto_id = $vuelo->piloto->user->piloto->id;
        $regions = Region::where('status',1)
                    ->whereHas('airports', function($q) use ($piloto_id) {
						$q->where('status', 1)
						->whereHas('pilotos', function($q2) use ($piloto_id) {
							$q2->where('status', 1)->where('piloto_id',$piloto_id);
						});
                    })
                    ->orderBy('nombre', 'asc')
                    ->get();
        $pilotos = Piloto::where('status',1)->where('user_id','!=',$current_user)->get();
        return view('vuelos.llegadas.create', ['vuelo'=>$vuelo, 'pilotos'=>$pilotos, 'regions'=>$regions]);
    }

    public function store(Request $request)
    {
    	//Actualizar status del vuelo
        $vuelo = Vuelo::find($request->id);
    	$vuelo->status = 4;
    	$vuelo->save();
    	//Detalles de la Llegada
    	$llegada = new VueloLlegada();
    	$llegada->vuelo_id = $vuelo->id;
    	$t_start = $request->fecha." ".$request->hora.":00";
        $time_start = strtotime($t_start);
        $llegada->fecha = date('Y-m-d H:i:s', $time_start);
        $llegada->tacometro = $request->tacometro;
        $llegada->comentarios = $request->comentarios;
        $llegada->airport_id = $request->airport_id;
    	$llegada->save();
        //Excepcion de Cobro minimo
        $excepcion=null;
        if ($vuelo->cobros->excepcion == 1) {$excepcion=true;}
    	//Detalles para Cobros 
    	$vuelo->cobros->tacometro = $llegada->tacometro - $vuelo->salida->tacometro;
        $vuelo->cobros->tiempo_vuelo = strtotime($llegada->fecha) - strtotime($vuelo->salida->fecha);
        $vuelo->cobros->monto = calculateMontoTipoVuelo($vuelo->vuelo_tipo_id, $vuelo->cobros->tacometro,$excepcion);
        if($vuelo->tipo->id != 6) { //El Vuelo RAID no almacena monto de cobros aquí
            $vuelo->cobros->save();
        }
        //Guarda el Registro en la Cuenta Corriente de Saldo de Piloto
        $ps = new PilotoSaldo();
        $ps->piloto_id = $vuelo->piloto->user->piloto->id;
        $ps->fecha = date('Y-m-d H:i:s');
        $ps->monto = -1 * abs($vuelo->cobros->monto);
        $last_saldo = PilotoSaldo::where('piloto_id',$ps->piloto_id)->orderBy('fecha', 'desc')->first();
        $ps->saldoactual = $last_saldo->saldoactual + $ps->monto;
        $descripcion = 'Vuelo '.$vuelo->tipo->nombre.', Nro. '.$vuelo->id.', patente: '.$vuelo->airplane->patente.'.';
        $ps->descripcion = $descripcion;
        $ps->tipo = 2;
        $ps->forma_pago = 0;
        $ps->save();
        //Descuenta el monto del saldo del piloto
        $vuelo->piloto->user->piloto->saldo = $ps->saldoactual;
        $vuelo->piloto->user->piloto->save();
                
        //Suma Horas de Vuelo al Avión
        $vuelo->airplane->horasactuales = $vuelo->airplane->horasactuales + $vuelo->cobros->tacometro;
        $vuelo->airplane->horasdevuelo = $vuelo->airplane->horasdevuelo + $vuelo->cobros->tacometro;
        $vuelo->airplane->save();
        $h = new AirplaneHora();
        $h->airplane_id = $vuelo->airplane_id;
        $h->horas = $vuelo->cobros->tacometro;
        $last_hora = AirplaneHora::where('airplane_id',$vuelo->airplane_id)->orderBy('fecha', 'desc')->first();
        $h->acumuladas = $last_hora->acumuladas + $vuelo->cobros->tacometro;
        $h->descripcion = $descripcion;
        $h->fecha = date('Y-m-d H:i');
        $h->save();

        //Suma Horas de Vuelo a las Piezas del Avión
        $piezas = AirplanePieza::where('airplane_id',$vuelo->airplane_id)->get();
        foreach($piezas as $pieza){
            $pieza->horasdeuso = $pieza->horasdeuso + $vuelo->cobros->tacometro;
            $pieza->save();
            // Validaciones de piezas:
            // Si la pieza está vencida, el avión no puede volar.
            if($pieza->horasdeuso >= $pieza->pieza->tbohora){
                $airplane = Airplane::find($vuelo->airplane_id);
                $airplane->status = 3; // Avión fuera de Servicio
                $airplane->save();
                // Notificación de que la pieza ha expirado.
                $administradores = User::where('rol', 2)->get();
                foreach($administradores as $administrador){
                    $notificacion = new Notification();
                    $notificacion->user_id = $administrador->id;
                    $notificacion->detalle = "Ha expirado la pieza: " . $pieza->pieza->piezatipo->nombre . ", " . $pieza->pieza->fabricante->nombre . ", N° de serie " . $pieza->pieza->serie . ", N° de Parte " . $pieza->pieza->partnumber . ", el avión " . $airplane->patente . " (" . $airplane->model->nombre . " " . $airplane->model->brand->nombre . ") " . " está fuera de servicio";
                    $notificacion->save();    
                }
            }
            // Notificación de que la pieza está A PUNTO de vencerse:
            if($pieza->horasdeuso >= ($pieza->pieza->tbohora - $pieza->notidifusotbo)){
                $administradores = User::where('rol', 2)->get();
                foreach($administradores as $administrador){
                    $notificacion = new Notification();
                    $notificacion->user_id = $administrador->id;
                    $notificacion->detalle = "Faltan pocas horas para que la pieza: " . $pieza->pieza->piezatipo->nombre . ", " . $pieza->pieza->fabricante->nombre . ", N° de serie " . $pieza->pieza->serie . ", N° de Parte " . $pieza->pieza->partnumber . " Iguale su TBO horas y expire. Avión " . $airplane->patente . " (" . $airplane->model->nombre . " " . $airplane->model->brand->nombre . ")";
                    $notificacion->save();    
                }
            }
        }
        //Suma Horas de Vuelo al Piloto
        $vuelo->piloto->user->piloto->horasdevuelo = $vuelo->piloto->user->piloto->horasdevuelo + $vuelo->cobros->tacometro;
        $vuelo->piloto->user->piloto->save();
        $h = new PilotoHora();
        $h->piloto_id = $vuelo->piloto->user->piloto->id;
        $h->horas = $vuelo->cobros->tacometro;
        $last = PilotoHora::where('piloto_id',$vuelo->piloto->user->piloto->id)->orderBy('fecha', 'desc')->first();
        $h->acumuladas = $last->acumuladas + $vuelo->cobros->tacometro;
        $h->descripcion = "Vuelo #".$vuelo->id;
        $h->fecha = date('Y-m-d H:i');
        $h->save();
        if ($vuelo->copiloto != null) {
            $vuelo->copiloto->user->piloto->horasdevuelo = $vuelo->copiloto->user->piloto->horasdevuelo + $vuelo->cobros->tacometro;
            $vuelo->copiloto->user->piloto->save();
            $h = new PilotoHora();
            $h->piloto_id = $vuelo->copiloto->user->piloto->id;
            $h->horas = $vuelo->cobros->tacometro;
            $last = PilotoHora::where('piloto_id',$vuelo->copiloto->user->piloto->id)->orderBy('fecha', 'desc')->first();
            $h->acumuladas = $last->acumuladas + $vuelo->cobros->tacometro;
            $h->descripcion = "Vuelo #".$vuelo->id;
            $h->fecha = date('Y-m-d H:i');
            $h->save();
        }
    	/* end */
        return redirect()->route('vuelos.show', ['id' => $vuelo->id])->with('success', 'Vuelo Finalizado Exitosamente');
    }
    
}
