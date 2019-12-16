<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use App\Vuelo;
use App\VueloCobro;
use Illuminate\Http\Request;

class VueloController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }
    
    public function historico()
    {
    	$current_user = Auth::user()->id;
    	if (Auth::user()->rol == 1) { //Piloto
    		$vuelos = Vuelo::where('status',4)
            ->whereHas('users', function($query) use ($current_user) {
		        $query->where([
		        	['user_id',$current_user],
                    ['rol',1]
		        ])->orWhere([
                    ['user_id',$current_user],
                    ['rol',2]
                ]);
		    })
	        ->get();
    	} elseif (Auth::user()->rol == 2) { //Administrador
    		$vuelos = Vuelo::where('status',4)->get();
    	}
        return view('vuelos.historico', ['vuelos'=>$vuelos]);
    }

    public function informe($id) {
        $vuelo = Vuelo::find($id);
        $filename = "Informe de Vuelo Nro. ".$vuelo->id;
        $data = [
        'title' => $filename,
        'heading' => $filename,
        'content' => [
                'Fecha del Vuelo' => dateformat($vuelo->salida->fecha),
                'Desde' => $vuelo->salida->airport->nombre . " (" . $vuelo->salida->airport->oaci . ")",
                'Hasta' => $vuelo->llegada->airport->nombre . " (" . $vuelo->llegada->airport->oaci . ")",
                'Naturaleza del Vuelo' => $vuelo->tipo->nombre,
                'Monto a Pagar' => clp($vuelo->cobros->monto),
                'Tacómetro' => $vuelo->cobros->tacometro,
                'Total Horas del Avión' => $vuelo->airplane->horasdevuelo,
                'Hora Reloj Inicio' => timeFormat($vuelo->salida->fecha),
                'Hora Reloj Final' => timeFormat($vuelo->llegada->fecha),
                'Hora Reloj Remanente' => segundos_a_hora($vuelo->cobros->tiempo_vuelo),
            ]
            
        ];
        $pdf = PDF::loadView('vuelos.pdf.informe', $data);  
        return $pdf->download($filename.'.pdf');
    }

    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        return view('vuelos.show', ['vuelo'=>$vuelo]);
    }

    public function volando()
    {
        $vuelos = Vuelo::where('status',3)->get();
        return view('vuelos.volando', ['vuelos'=>$vuelos]);
    }


}

