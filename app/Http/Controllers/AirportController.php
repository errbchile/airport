<?php

namespace App\Http\Controllers;

use Auth;
use App\Airport;
use App\Region;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function ajax_select(Request $request) {
        if ($request->tipo == 'region') {
            if (!isset($request->piloto_id)) {
                $airports = Airport::where([
                    ['region_id',$request->id],
                    ['status',1]
                ])
                ->get();
            } else {
                $piloto_id = $request->piloto_id;
                $airports = Airport::where([
                    ['region_id',$request->id],
                    ['status',1]
                ])
                ->whereHas('pilotos', function($q) use ($piloto_id) {
                    $q->where('status', 1)->where('piloto_id',$piloto_id);
                })
                ->get();
            }
            
        }
        echo "<option selected disabled>Seleccione un Aeropuerto</option>";
        foreach ($airports as $a) {
            echo "<option value='$a->id'>".$a->oaci." - ".$a->nombre." (".$a->ciudad.")</option>";
        }
    }

    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $airports = Airport::where('status',1)->get();
        return view('airports.index', ['airports'=>$airports]);
    }

    public function create()
    {
        $regiones = Region::where('status',1)->get();
        return view('airports.create', ['regiones'=>$regiones]);
    }

    public function store(Request $request)
    {
        $airport = new Airport();
        $airport->nombre = $request->nombre;
        $airport->ciudad = $request->ciudad;
        $airport->oaci = $request->oaci;
        $airport->region_id = $request->region_id;
        
        return view('airports.index');
    }

    public function show($id)
    {
        $airport = Airport::find($id);
        return view('airports.show', ['airport'=>$airport]);
    }

    public function edit($id)
    {
        $airport = Airport::find($id);
        return view('airports.edit', ['airport'=>$airport]);
    }

    public function update(Request $request)
    {
        $airport = Airport::find($request->id);
        $airport->region_id = $request->region_id;
        $airport->ciudad = $request->ciudad;
        $airport->nombre = $request->nombre;
        $airport->oaci = $request->oaci;
        $airport->save();
        return redirect()->route('airports.show', ['id' => $request->id])->with('success', 'Actualización exitosa');
    }
}
