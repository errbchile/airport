<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\AirplaneBrand;
use Illuminate\Http\Request;

class AirplaneBrandController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $airplanebrands = AirplaneBrand::where('status',1)->get();
        $airplanes = Airplane::where('status',1)->get();
        return view('airplanebrands.index', ['airplanebrands'=>$airplanebrands, 'airplanes' => $airplanes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airplanebrands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airplanebrand = new AirplaneBrand();
        $airplanebrand->nombre = $request->nombre;
        $airplanebrand->save();

        return redirect()->route('airplanemodels.create')->with('success', 'Marca registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirplaneBrand  $airplaneBrand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airplanebrand = AirplaneBrand::find($id);
        return view('airplanebrands.show', ['airplanebrand'=>$airplanebrand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirplaneBrand  $airplaneBrand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplanebrand = AirplaneBrand::find($id);
        return view('airplanebrands.edit', ['airplanebrand' => $airplanebrand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirplaneBrand  $airplaneBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirplaneBrand $airplaneBrand)
    {
        $airplanebrand = AirplaneBrand::find($request->id);
        $airplanebrand->nombre = $request->nombre;
        $airplanebrand->save();

        return redirect()->route('airplanebrands')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirplaneBrand  $airplaneBrand
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $airplanebrand = AirplaneBrand::find($id)->delete();
        return view('airplanebrands');
    }
}
