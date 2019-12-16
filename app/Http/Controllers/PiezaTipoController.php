<?php

namespace App\Http\Controllers;

use App\Pieza;
use App\PiezaTipo;
use Illuminate\Http\Request;

class PiezaTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piezatipos = PiezaTipo::where('status',1)->orWhere('status',0)->get();
        return view('inventario.piezatipos.index', ['piezatipos'=>$piezatipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.piezatipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $piezatipo = new PiezaTipo();
        $piezatipo->nombre = $request->nombre;
        $piezatipo->save();

        return redirect()->route('inventario.piezatipos')->with('success', 'Tipo de Pieza Registrado Exitosamente');
    }

    public function deshabilitar($id)
    {
        $piezatipo = PiezaTipo::find($id);
        if($piezatipo->status == 0){ // Habilitar
            $piezatipo->status = 1;
            $piezatipo->save();
            return redirect()->route('inventario.piezatipos')->with('success', 'Activado con Éxito');
        }elseif($piezatipo->status == 1){ // Deshabilitar
            $piezatipo->status = 0;
            $piezatipo->save();
            return redirect()->route('inventario.piezatipos')->with('success', 'Desactivado con Éxito');
        }
        
    }

    public function delete($id)
    {
        $piezatipo = PiezaTipo::find($id);
        if($piezatipo->eliminable == 1){ // Pueden ser borrados
            //Validación:
            // Que no tenga piezas relacionadas
            $piezasrelacionadas = Pieza::where('pieza_tipo_id', $piezatipo->id)->first();
            if ($piezasrelacionadas == null) {
                // Borrar Tipo de Pieza (Status 3)
                $piezatipo = PiezaTipo::find($id);
                $piezatipo->status = 3;
                $piezatipo->save();
                return redirect()->route('inventario.piezatipos')->with('success', 'Borrado Exitoso');
            }else{
                return redirect()->back()->with('error', 'No se puede borrar porque hay piezas registradas en el sistema relacionadas a este tipo de piezas');
            }
        }elseif ($piezatipo->eliminable == 1){ // Originales
            return redirect()->back()->with('error', 'No tiene permitido eliminar esta modalidad.');
        }    
    }

    public function show(PiezaTipo $piezaTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PiezaTipo  $piezaTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(PiezaTipo $piezaTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PiezaTipo  $piezaTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PiezaTipo $piezaTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PiezaTipo  $piezaTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PiezaTipo $piezaTipo)
    {
        //
    }
}
