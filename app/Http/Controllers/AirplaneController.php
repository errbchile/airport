<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\AirplaneAlertTacometro;
use App\AirplaneBrand;
use App\AirplaneModel;
use App\AirplanePieza;
use App\Mantencion;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }


    public function index()
    {
        $airplanes = Airplane::all();
        return view('airplanes.index', ['airplanes'=>$airplanes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airplanes = Airplane::where('status',1)->get();
        $brands = AirplaneBrand::where('status',1)->get();
        $models = AirplaneModel::where('status',1)->get();
        return view('airplanes.create', ['airplanes'=>$airplanes, 'brands'=>$brands, 'models'=>$models]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airplane = new Airplane();
        $airplane->patente = $request->patente;
        $airplane->airplane_model_id = $request->airplane_model_id;
        $airplane->permiso = $request->permiso;
        $airplane->vencimiento = $request->vencimiento;
        $airplane->horasactuales = $request->horasactuales;
        $airplane->horasdevuelo = $request->horasdevuelo;
        $airplane->status = $request->status;
        
        $airplane->save();

        return redirect()->route('airplanes')->with('success', 'Avión registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airplanepiezas = AirplanePieza::where('airplane_id', $id)->get();
        $mantenciones = Mantencion::where('airplane_id', $id)->get();
        $airplane = Airplane::find($id);
        $tacometros = AirplaneAlertTacometro::where('airplane_id', $id)->where('status', 1)->get();
        return view('airplanes.show', ['airplane'=>$airplane, 'tacometros'=>$tacometros, 'airplanepiezas'=>$airplanepiezas, 'mantenciones'=>$mantenciones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplane = Airplane::find($id);
        $models = AirplaneModel::where('status',1)->get();
        return view('airplanes.edit', ['airplane'=>$airplane, 'models'=>$models]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $airplane = Airplane::find($request->id);
        $airplane->patente = $request->patente;
        $airplane->airplane_model_id = $request->airplane_model_id;
        $airplane->permiso = $request->permiso;
        $airplane->vencimiento = $request->vencimiento;
        $airplane->status = $request->status;
        $airplane->save();
        return redirect()->route('airplanes.show', ['id' => $request->id])->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airplane $airplane)
    {
        //
    }
}
