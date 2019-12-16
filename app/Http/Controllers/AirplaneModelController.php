<?php

namespace App\Http\Controllers;

use App\AirplaneModel;
use App\AirplaneBrand;
use Illuminate\Http\Request;

class AirplaneModelController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }


    public function index()
    {
        $airplanemodels = AirplaneModel::where('status',1)->get();
        return view('airplanemodels.index', ['airplanemodels'=>$airplanemodels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airplanemodel = AirplaneModel::where('status',1)->get();
        $airplanebrands = AirplaneBrand::where('status',1)->get();
        return view('airplanemodels.create', ['airplanemodel'=>$airplanemodel, 'airplanebrands'=>$airplanebrands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airplanemodel = new AirplaneModel();
        $airplanemodel->airplane_brand_id = $request->airplane_brand_id;
        $airplanemodel->nombre = $request->nombre;
        $airplanemodel->save();

        return redirect()->route('airplanemodels')->with('success', 'Modelo registrada exitósamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirplaneModel  $airplaneModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airplanemodel = AirplaneModel::find($id);
        return view('airplanemodels.show', ['airplanemodel'=>$airplanemodel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirplaneModel  $airplaneModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplanemodel = AirplaneModel::find($id);
        $airplanebrands = AirplaneBrand::where('status',1)->get();
        return view('airplanemodels.edit', ['airplanemodel'=>$airplanemodel, 'airplanebrands'=>$airplanebrands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirplaneModel  $airplaneModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirplaneModel $airplaneModel)
    {
        $airplanemodel = AirplaneModel::find($request->id);
        $airplanemodel->airplane_brand_id = $request->airplane_brand_id;
        $airplanemodel->nombre = $request->nombre;
        $airplanemodel->save();

        return redirect()->route('airplanemodels')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirplaneModel  $airplaneModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $airplanemodel = AirplaneModel::find($request->id);
        $airplanemodel->status = 2;
        $airplanemodel->save();
        return redirect()->route('airplanemodels')->with('success', 'Borrado exitoso');
    }
}
