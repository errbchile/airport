<?php

namespace App\Http\Controllers;

use App\Pieza;
use App\PiezaFabricante;
use Illuminate\Http\Request;

class PiezaFabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = PiezaFabricante::where('status',1)->orWhere('status',0)->get();
        return view('inventario.piezafabricantes.index', ['fabricantes'=>$fabricantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.piezafabricantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabricante = new PiezaFabricante();
        $fabricante->nombre = $request->nombre;
        $fabricante->save();

        return redirect()->route('inventario.piezafabricantes')->with('success', 'Fabricante Registrado Con Éxito');
    }

    public function deshabilitar($id)
    {
        $piezafabricante = PiezaFabricante::find($id);
        if($piezafabricante->status == 0){ // Habilitar
            $piezafabricante->status = 1;
            $piezafabricante->save();
            return redirect()->route('inventario.piezafabricantes')->with('success', 'Activado con Éxito');
        }elseif($piezafabricante->status == 1){ // Deshabilitar
            $piezafabricante->status = 0;
            $piezafabricante->save();
            return redirect()->route('inventario.piezafabricantes')->with('success', 'Desactivado con Éxito');
        }
        
    }

    public function delete($id)
    {
        $piezafabricante = PiezaFabricante::find($id);
        if($piezafabricante->eliminable == 1){ // Pueden ser borrados
            //Validación:
            // Que no tenga piezas relacionadas
            $piezasrelacionadas = Pieza::where('pieza_fabricante_id', $piezafabricante->id)->first();
            if ($piezasrelacionadas == null) {
                // Borrar fabricante (Status 3)
                $piezafabricante = PiezaFabricante::find($id);
                $piezafabricante->status = 3;
                $piezafabricante->save();
                return redirect()->route('inventario.piezafabricantes')->with('success', 'Borrado exitoso');
            }else{
                return redirect()->back()->with('error', 'No se puede borrar porque hay piezas registradas en el sistema relacionadas a dicho fabricante');
            }
        }elseif ($piezafabricante->eliminable == 1){ // Originales
            return redirect()->back()->with('error', 'No tiene permitido eliminar esta modalidad.');
        }    
    }

    public function show(PiezaFabricante $piezaFabricante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PiezaFabricante  $piezaFabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(PiezaFabricante $piezaFabricante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PiezaFabricante  $piezaFabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PiezaFabricante $piezaFabricante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PiezaFabricante  $piezaFabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(PiezaFabricante $piezaFabricante)
    {
        //
    }
}
