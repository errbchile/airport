<?php

namespace App\Http\Controllers;

use App\AirplaneAlertTacometro;
use Illuminate\Http\Request;

class AirplaneAlertTacometroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tacometros = AirplaneAlertTacometro::where('status',1)->get();
        return view('airplanes.tacometroalerta', ['tacometros'=>$tacometros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirplaneAlertTacometro  $airplaneAlertTacometro
     * @return \Illuminate\Http\Response
     */
    public function show(AirplaneAlertTacometro $airplaneAlertTacometro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirplaneAlertTacometro  $airplaneAlertTacometro
     * @return \Illuminate\Http\Response
     */
    public function edit(AirplaneAlertTacometro $airplaneAlertTacometro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirplaneAlertTacometro  $airplaneAlertTacometro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirplaneAlertTacometro $airplaneAlertTacometro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirplaneAlertTacometro  $airplaneAlertTacometro
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirplaneAlertTacometro $airplaneAlertTacometro)
    {
        //
    }
}
