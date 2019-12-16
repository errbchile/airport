<?php

namespace App\Http\Controllers;

use Auth;
use App\Vuelo;
use App\VueloRechazo;
use Illuminate\Http\Request;

class VueloRechazoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

     public function create($vuelo_id)
    {
        $vuelo = Vuelo::find($vuelo_id);
        return view('vuelos.rechazos.create', ['vuelo'=>$vuelo]);
    }
    
    public function store(Request $request)
    {
        // Generando registro de la anulación:
        $vuelo_rechazado = new VueloRechazo();
        $vuelo_rechazado->vuelo_id = $request->vuelo_id;
        $vuelo_rechazado->tipo = $request->tipo;
        $vuelo_rechazado->comentarios = $request->comentarios;
        $vuelo_rechazado->save();

        // Status 0 en la tabla Vuelos:
        $vuelo = Vuelo::find($request->vuelo_id);
        $vuelo->status = 0;
    	$vuelo->save();

		if(Auth::user()->rol == 1){ //Piloto
        	return redirect()->route('vuelos_salidas')->with('success', 'Vuelo anulado exitosamente.');
        }elseif (Auth::user()->rol ==2) { //Admin
        	return redirect()->route('vuelos_solicitudes')->with('success', 'Vuelo anulado exitosamente.');
        }
    }
}
