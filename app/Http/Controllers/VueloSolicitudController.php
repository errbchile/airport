<?php

namespace App\Http\Controllers;

use Auth;
use App\Airplane;
use App\AirplanePieza;
use App\Piloto;
use App\PilotoAirplaneModel;
use App\PilotoSaldo;
use App\User;
use App\Vuelo;
use App\VueloSolicitud;
use App\VueloTipo;
use App\VueloUser;
use Illuminate\Http\Request;

class VueloSolicitudController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $vuelos = Vuelo::where('status',1)->orWhere('status',2)->get();
        return view('vuelos.solicitudes.index', ['vuelos'=>$vuelos]);
    }

    public function create()
    {
        $currentpiloto = Auth::user()->piloto->id;
        $airplanes = Airplane::where('status',1)
        ->whereHas('model', function($q) use ($currentpiloto) {
            $q->where('status',1)
            ->whereHas('pilotos', function($q2) use ($currentpiloto) {
                $q2->where('status',1)
                ->where('piloto_id',$currentpiloto);
            });
        })
        ->get();
        $tipos = VueloTipo::where('status',1)->get();
        return view('vuelos.solicitudes.create', ['tipos'=>$tipos, 'airplanes' => $airplanes]);
    }

    public function store(Request $request)
    {

        /* Validar avión */
        if ($request->airplane_id == 0) {
            return redirect()->back()->with('error', 'Debe tener un avión seleccionado.');
        }


        /* Validar Fechas */
        $t_start = $request->start_fecha." ".$request->start_hora.":00";
        $time_start = strtotime($t_start);
        $t_end = $request->end_fecha." ".$request->end_hora.":00";
        $time_end = strtotime($t_end);
        $tiempo_vuelo = $time_end - $time_start;

        //Validar que el tiempo de vuelo no supere el TBOhoras de alguna de las piezas del avión
        $airplanepiezas = AirplanePieza::where('airplane_id', $request->airplane_id)->get();
        foreach($airplanepiezas as $airplanepieza){
            $horasdeusofuturas = $airplanepieza->horasdeuso + ($tiempo_vuelo / 3600);
            if ($horasdeusofuturas >= $airplanepieza->pieza->tbohora) {
                return redirect()->back()->with('error', 'El tiempo solicitado coincide con mantenciones futuras programadas para dicho avión');
            }
        }

        /* Validar Credito */
        $tresdiasantes = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '-3 day'));
        $piloto_id = Auth::user()->piloto->id;
        $saldosdelpilotopasado3dias = PilotoSaldo::where('piloto_id', $piloto_id)->where('fecha', '>=', $tresdiasantes)->orderby('fecha','DESC')->get();
        $listoparavolar = false;
        //Si no tiene movimientos de saldo en los ultimos tres dias
        if ($saldosdelpilotopasado3dias == null) {
            $lastSaldo = PilotoSaldo::where('piloto_id', $piloto_id)->orderby('fecha','DESC')->first();
            if ($lastSaldo->saldoactual >= 0) {$listoparavolar = true;}
        } else {
            //Si tiene algun saldo positivo
            $i=0;
            foreach ($saldosdelpilotopasado3dias as $saldo) { $i++;
                if ($saldo->saldoactual >= 0) {$listoparavolar = true;}
                //Determinar si la deuda es anterior a el ultimo registro de hace tres dias
                if ($i == count($saldosdelpilotopasado3dias)) {
                    $saldoAnterior = $saldo->saldoactual-$saldo->monto;
                    if ($saldoAnterior >= 0) {$listoparavolar = true;}
                }
            }
        }

        if ($listoparavolar == false && $request->vuelo_tipo_id != 6) {
            return redirect()->back()->with('error', 'No tiene permitido volar hasta que regularice su deuda mayor a tres días.');
        }

        /* Que el monto resultante de la solicitud no supere un crédito de 140mil pesos */
        if($request->vuelo_tipo_id != 6){
            $precioestimadodelasolicitud = calculateMontoTipoVuelo($request->vuelo_tipo_id, ($tiempo_vuelo / 3600));
            $saldodelpilotomascredito = (Auth::user()->piloto->saldo) + 140000;
            if ($precioestimadodelasolicitud > $saldodelpilotomascredito) {
                return redirect()->back()->with('error', 'El monto estimado de su solicitud supera los límites permitidos. Por favor agregue dinero a su cuenta');
            }
        }
        
        /* Que la fecha final sea mayor a la fecha inicial */
        if ($tiempo_vuelo < 0) {
        return redirect()->back()->with('error', 'La fecha y hora de llegada debe ser futura a la fecha y hora de salida.');
        }

        /* Validar Disponibilidad de Horas */
        $puede_volar=true;
        $vuelos_reservados = Vuelo::where([
            ['status',1],
            ['airplane_id',$request->airplane_id]
        ])->orWhere([
            ['status',2],
            ['airplane_id',$request->airplane_id]
        ])
        ->get();
        foreach ($vuelos_reservados as $v) {
            $db_start = strtotime($v->solicitud->start);
            $db_end = strtotime($v->solicitud->end);
            if ($time_end > $db_start && $time_start < $db_end){
                $puede_volar=false;
            }
        }
        if ($puede_volar == false) {
        return redirect()->back()->with('error', 'Las horas de vuelo se encuentran ocupadas con otros vuelos ya solicitados.');
        }

        /* Vuelo */
        $vuelo = new Vuelo();
        //Avion
        $vuelo->airplane_id = $request->airplane_id;
        //Tipo de Vuelo
        $vuelo->vuelo_tipo_id = $request->vuelo_tipo_id;
        //Status
        if ($vuelo->tipo->id == 6){ //Tipo Vuelo RAID
            $vuelo->status = 1;
        } else {
            $vuelo->status = 2;
        }
        //save
        $vuelo->save();

        /* Usuario que solicita el Vuelo */
        $user = new VueloUser();
        $user->vuelo_id = $vuelo->id;
        $user->user_id = Auth::user()->id;
        $user->rol = 1;
        $user->save();

        /* Solicitud de Vuelo */
        $solicitud = new VueloSolicitud();
        $solicitud->vuelo_id = $vuelo->id;
        //Fecha y Hora de Inicio
        $solicitud->start = date('Y-m-d H:i:s', $time_start);
        //Fecha y Hora de Termino
        $solicitud->end = date('Y-m-d H:i:s', $time_end);
        //Tiempo de Vuelo
        $solicitud->tiempo_vuelo = $tiempo_vuelo;
        //save
        $solicitud->save();
        setLog("Se generó la Solicitud de Vuelo #".$vuelo->id." para el Avión con Patente ".$vuelo->airplane->patente." para un vuelo de Tipo ".$vuelo->tipo->nombre." para el día ".$request->start_fecha." a las ".$request->start_hora." hrs. hasta el día ".$request->end_fecha." a las ".$request->end_hora." hrs.");

        /* end */
        return redirect()->route('vuelos_salidas')->with('success', 'Vuelo solicitado exitosamente.');
    }

    public function accion(Request $request)
    {
        $vuelo = Vuelo::find($request->id);

        if ($request->accion == 'aprobar') {
            $vuelo->status = 2;
            $text = 'La Solicitud de vuelo #'.$vuelo->id.' fue aprobada exitosamente.';
        }
        if ($request->accion == 'rechazar') {
            $vuelo->status = 0;
            $text = 'La Solicitud de vuelo #'.$vuelo->id.' fue rechazada.';
        }
        $vuelo->save();
        setNotification($text,$vuelo->piloto->user_id);
        return redirect()->back()->with('success', $text);
    }
    
}
