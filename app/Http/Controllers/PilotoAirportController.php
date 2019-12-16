<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Piloto;
use App\PilotoAirport;
use App\Region;
use App\User;
use Illuminate\Http\Request;

class PilotoAirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilotoairports = PilotoAirport::where('status',1)->get();
        return view('pilotoairports.index', ['pilotoairports'=>$pilotoairports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pilotoairports = PilotoAirport::where('status',1)->get();
        $users = User::where('status',1)->get();
        return view('pilotoairports.create', ['pilotoairports'=>$pilotoairports, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pilotoairport = new PilotoAirport();
        $pilotoairport->airport_id = $request->airport_id;
        $pilotoairport->piloto_id = $request->piloto_id;
        $pilotoairport->save();

        return redirect()->route('pilotoairports.index')->with('success', 'Habilitación de pista registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PilotoAirport  $pilotoAirport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pilotoairport = PilotoAirport::find($id);
        return view('pilotoairports.show', ['pilotoairport'=>$pilotoairport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PilotoAirport  $pilotoAirport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piloto = Piloto::find($id);
        $airports = Airport::where('status',1)->orderBy('nombre', 'asc')->get();
        $regions = Region::where('status',1)->get();
        return view('pilotoairports.edit', ['piloto'=>$piloto, 'airports'=>$airports, 'regions'=>$regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PilotoAirport  $pilotoAirport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PilotoAirport $pilotoAirport)
    {
        // Borrando los modelos del piloto en la tabla PilotoAirplaneModel
        $pilotoairport = PilotoAirport::where('piloto_id', $request->piloto_id)->delete();

        //Registrando los nuevos modelos del piloto en la tabla PilotoAirplaneModel
        if($request->airports != null) {
            foreach ($request->airports as $airport){
                $pilotoairport = new PilotoAirport();
                $pilotoairport->airport_id = $airport;
                $pilotoairport->piloto_id = $request->piloto_id;
                $pilotoairport->save();
            }
        }
        return redirect()->route('pilotos.show', ['id' => $request->piloto_id])->with('success', 'Actualización exitosa');
    }


    public function destroy(PilotoAirport $pilotoAirport)
    {
        //
    }
}
