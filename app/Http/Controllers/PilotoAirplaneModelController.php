<?php

namespace App\Http\Controllers;

use App\PilotoAirplaneModel;
use App\AirplaneModel;
use App\Piloto;
use App\User;
use Illuminate\Http\Request;

class PilotoAirplaneModelController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $pilotoairplanemodels = PilotoAirplaneModel::where('status',1)->get();
        return view('pilotoairplanemodels.index', ['pilotoairplanemodels'=>$pilotoairplanemodels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airplanemodels = AirplaneModel::where('status',1)->get();
        $users = User::where('status',1)->get();
        return view('pilotoairplanemodels.create', ['airplanemodels'=>$airplanemodels, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pilotoairplanemodel = new PilotoAirplaneModel();
        $pilotoairplanemodel->airplane_model_id = $request->airplane_model_id;
        $pilotoairplanemodel->piloto_id = $request->piloto_id;
        $pilotoairplanemodel->save();

        return redirect()->route('pilotoairplanemodels.index')->with('success', 'Habilitación de avión registrada exitósamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PilotoAirplaneModel  $pilotoAirplaneModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pilotoairplanemodel = PilotoAirplaneModel::find($id);
        return view('pilotoairplanemodels.show', ['pilotoairplanemodel'=>$pilotoairplanemodel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PilotoAirplaneModel  $pilotoAirplaneModel
     * @return \Illuminate\Http\Response
     */
    public function edit($piloto_id)
    {
        $piloto = Piloto::find($piloto_id);
        $modelos = AirplaneModel::where('status',1)->get();
        return view('pilotoairplanemodels.edit', ['piloto'=>$piloto, 'modelos'=>$modelos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PilotoAirplaneModel  $pilotoAirplaneModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PilotoAirplaneModel $pilotoAirplaneModel)
    {
        // Borrando los modelos del piloto en la tabla PilotoAirplaneModel
        $pilotoairplanemodel = PilotoAirplaneModel::where('piloto_id', $request->piloto_id)->delete();

        //Registrando los nuevos modelos del piloto en la tabla PilotoAirplaneModel
        if($request->modelos != null) {
            foreach ($request->modelos as $modelo){
                $pilotoairplanemodel = new PilotoAirplaneModel();
                $pilotoairplanemodel->airplane_model_id = $modelo;
                $pilotoairplanemodel->piloto_id = $request->piloto_id;
                $pilotoairplanemodel->save();
            }
        }
        return redirect()->route('pilotos.show', ['id' => $request->piloto_id])->with('success', 'Actualización Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PilotoAirplaneModel  $pilotoAirplaneModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PilotoAirplaneModel $pilotoAirplaneModel)
    {
        //
    }
}
