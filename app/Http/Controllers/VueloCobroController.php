<?php

namespace App\Http\Controllers;

use App\VueloCobro;
use Illuminate\Http\Request;

class VueloCobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function excepcion($vuelo_id)
    {
        $vuelocobro = VueloCobro::where('vuelo_id', $vuelo_id)->first();
        if ($vuelocobro->vuelo->status == 3) {
            if ($vuelocobro->excepcion != 1) {
                $vuelocobro->excepcion = 1;
                $vuelocobro->save();
                return redirect()->route('vuelos.volando')->with('success', 'Excepción agregada exitosamente');
            }else {
                $vuelocobro->excepcion = 0;
                $vuelocobro->save();
                return redirect()->route('vuelos.volando')->with('success', 'Excepción revertida exitosamente');
            }
            
            
        } else {
            return redirect()->route('vuelos.volando')->with('error', 'Error. Vuelo ya finalizado.');
        }
        
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VueloCobro  $vueloCobro
     * @return \Illuminate\Http\Response
     */
    public function show(VueloCobro $vueloCobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VueloCobro  $vueloCobro
     * @return \Illuminate\Http\Response
     */
    public function edit(VueloCobro $vueloCobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VueloCobro  $vueloCobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VueloCobro $vueloCobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VueloCobro  $vueloCobro
     * @return \Illuminate\Http\Response
     */
    public function destroy(VueloCobro $vueloCobro)
    {
        //
    }
}
