<?php

namespace App\Http\Controllers;

use Auth;
use App\Airport;
use App\AirplaneAlertTacometro;
use App\Piloto;
use App\PilotoAirport;
use App\Region;
use App\Vuelo;
use App\VueloCobro;
use App\VueloSalida;
use App\VueloUser;
use Illuminate\Http\Request;

class VueloSalidaController extends Controller
{
    
	public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
    	$current_user = Auth::user()->id;
        $vuelos = Vuelo::where('status',2)->orWhere('status',5)
        ->whereHas('users', function($query) use ($current_user) {
	        $query->where([
	        	['user_id',$current_user],
	        	['rol',1]
	        ]);
	    })
        ->get();
        return view('vuelos.salidas.index', ['vuelos'=>$vuelos]);
    }

    public function create($id)
    {
        //Validar que no tenga vuelos activos
        $user_id = Auth::user()->id;
        $vuelossincerrar = Vuelo::where(function ($query) {
                                $query->where('status',3)
                                      ->orWhere('status',5);
                            })
                            ->whereHas('users', function($q) use ($user_id) {
                                $q->where('user_id', $user_id);
                            })
                            ->get();
        if (count($vuelossincerrar) > 0) {
            return redirect()->back()->with('error', 'No tiene permitido volar hasta que finalice todos los vuelos iniciados.');
        }
        //Vista
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
        return view('vuelos.salidas.create',['vuelo'=>$vuelo, 'pilotos'=>$pilotos, 'regions'=>$regions]);
    }

    public function store(Request $request)
    {
    	//Actualizar status del vuelo
    	$vuelo = Vuelo::find($request->id);
    	$vuelo->status = 3;
    	$vuelo->save();
        //Diferencia de Tacometro
        if (getLastTacometroByAirplane($vuelo->airplane->id) != $request->tacometro) {
            $diferenciaDelTacometro = new AirplaneAlertTacometro();
            $diferenciaDelTacometro->airplane_id = $vuelo->airplane->id;
            $diferenciaDelTacometro->inicial = getLastTacometroByAirplane($vuelo->airplane->id);
            $diferenciaDelTacometro->final = $request->tacometro;
            $diferenciaDelTacometro->save();
        }
    	//Detalles de la Salida
    	$salida = new VueloSalida();
    	$salida->vuelo_id = $vuelo->id;
    	$t_start = $request->fecha." ".$request->hora.":00";
        $time_start = strtotime($t_start);
        $salida->fecha = date('Y-m-d H:i:s', $time_start);
		$salida->tacometro = $request->tacometro;
		$salida->comentarios = $request->comentarios;
		$salida->airport_id = $request->airport_id;
		
    	$salida->save();
    	//Detalles para Cobros
    	$cobros = new VueloCobro();
    	$cobros->vuelo_id = $vuelo->id;
    	$cobros->pasajeros = $request->pasajeros;
    	$cobros->save();
    	//Copiloto
    	if ($request->copiloto != 0) {
    		$user = new VueloUser();
	        $user->vuelo_id = $vuelo->id;
	        $user->user_id = $request->copiloto;
	        $user->rol = 2;
	        $user->save();
    	}
    	/* end */
        return redirect()->route('vuelos_llegadas')->with('success', 'Vuelo iniciado exitósamente');
    }

}
