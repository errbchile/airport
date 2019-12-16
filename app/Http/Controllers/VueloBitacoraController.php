<?php

namespace App\Http\Controllers;

use Auth;
use App\Airplane;
use App\AirplaneHora;
use App\Piloto;
use App\PilotoAirplaneModel;
use App\Region;
use App\PilotoHora;
use App\PilotoSaldo;
use App\User;
use App\Vuelo;
use App\VueloSolicitud;
use App\VueloSalida;
use App\VueloBitacora;
use App\VueloTipo;
use App\VueloUser;
use Illuminate\Http\Request;

class VueloBitacoraController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        //
    }

    public function createllegada($vuelo_id)
    {
        $current_user = Auth::user()->id;
        $vuelo = Vuelo::find($vuelo_id);
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
        return view('vuelos.bitacoras.createllegada', ['vuelo'=>$vuelo, 'pilotos'=>$pilotos, 'regions'=>$regions]);
    }

    public function storellegada(Request $request)
    {
        //Actualizar status del vuelo
        $vuelo = Vuelo::find($request->id);
        
        $vuelo->status = 5;
        $vuelo->save();
        //Detalles de la Llegada
        $llegada = new VueloBitacora();
        $llegada->vuelo_id = $vuelo->id;
        $t_start = $request->fecha." ".$request->hora.":00";
        $time_start = strtotime($t_start);
        $llegada->fecha = date('Y-m-d H:i:s', $time_start);
        $llegada->tacometro = $request->tacometro;
        $llegada->comentarios = 'Aterrizaje Parcial';
        $llegada->tipo = 1; //Llegada Parcial
        $llegada->airport_id = $request->airport_id;
        $llegada->save();
        //Excepcion de Cobro minimo
        $excepcion=null;
        if ($vuelo->cobros->excepcion == 1) {$excepcion=true;}
        //Detalles para Cobros 
        $vuelo->cobros->tacometro = $llegada->tacometro - $vuelo->salida->tacometro;
        $vuelo->cobros->tiempo_vuelo = strtotime($llegada->fecha) - strtotime($vuelo->salida->fecha);
        $vuelo->cobros->monto = calculateMontoTipoVuelo($vuelo->vuelo_tipo_id, $vuelo->cobros->tacometro,$excepcion);
        //$vuelo->cobros->save();
                
        //Suma Horas de Vuelo al Avión
        $vuelo->airplane->horasactuales = $vuelo->airplane->horasactuales + $vuelo->cobros->tacometro;
        $vuelo->airplane->horasdevuelo = $vuelo->airplane->horasdevuelo + $vuelo->cobros->tacometro;
        $vuelo->airplane->save();
        $h = new AirplaneHora();
        $h->airplane_id = $vuelo->airplane_id;
        $h->horas = $vuelo->cobros->tacometro;
        $last_hora = AirplaneHora::where('airplane_id',$vuelo->airplane_id)->orderBy('fecha', 'desc')->first();
        $h->acumuladas = $last_hora->acumuladas + $vuelo->cobros->tacometro;
        $h->descripcion = "Escala";
        $h->fecha = date('Y-m-d H:i');
        $h->save();
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
        return redirect()->route('vuelos_salidas', ['id' => $vuelo->id])->with('success', 'Aterrizaje Parcial Exitoso');
    
    }

     public function createsalida($vuelo_id)
    {
        $current_user = Auth::user()->id;
        $vuelo = Vuelo::find($vuelo_id);
        $vuelobitacora = VueloBitacora::where('vuelo_id', $vuelo_id)->first();
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
        return view('vuelos.bitacoras.createsalida', ['vuelo'=>$vuelo, 'pilotos'=>$pilotos, 'regions'=>$regions, 'vuelobitacora' => $vuelobitacora]);
    }

    public function storesalida(Request $request)
    {
        
        //Actualizar status del vuelo
        $vuelo = Vuelo::find($request->id);
        $vuelo->status = 3;
        $vuelo->save();

        //Detalles de la Salida
        $salida = new VueloBitacora();
        $salida->vuelo_id = $vuelo->id;
        $t_start = $request->fecha." ".$request->hora.":00";
        $time_start = strtotime($t_start);
        $salida->fecha = date('Y-m-d H:i:s', $time_start);
        $salida->tacometro = $request->tacometro;
        $salida->comentarios = 'Nuevo Despegue';
        $salida->tipo = 2;
        $salida->airport_id = $request->airport_id;
        
        $salida->save();
        /* end */
        return redirect()->route('vuelos_llegadas')->with('success', 'Nuevo Despegue Exitoso');
    
    }

    public function show(VueloBitacora $vueloBitacora)
    {
        //
    }

    public function edit(VueloBitacora $vueloBitacora)
    {
        //
    }

    public function update(Request $request, VueloBitacora $vueloBitacora)
    {
        //
    }

    public function destroy(VueloBitacora $vueloBitacora)
    {
        //
    }
}
