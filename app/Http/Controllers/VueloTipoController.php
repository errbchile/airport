<?php

namespace App\Http\Controllers;

use App\VueloTipo;
use Illuminate\Http\Request;

class VueloTipoController extends Controller
{
    
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $vuelotipos = VueloTipo::where('status',1)->orWhere('status',0)->get();
        return view('vuelos.tipos.index', ['vuelotipos'=>$vuelotipos]);
    }

    public function store(Request $request)
    {
    	$vuelotipo = new VueloTipo();
        $vuelotipo->nombre = $request->nombre;
        $vuelotipo->monto = $request->monto;
        $vuelotipo->min_hora = 0.5;
        $vuelotipo->save();

        return redirect()->route('vuelotipos')->with('success', 'Modalidad Registrada Exitosamente');
    }

    public function edit($vuelotipo_id)
    {
        $vuelotipo = VueloTipo::where('id', $vuelotipo_id)->first();
        return view('vuelos.tipos.edit', ['vuelotipo'=>$vuelotipo]);
    }

    public function update(Request $request)
    {
        $vuelotipo = VueloTipo::find($request->id);
        $vuelotipo->monto = $request->monto;
        $vuelotipo->save();
        return redirect()->route('vuelotipos.edit', ['vuelotipo_id' => $request->id])->with('success', 'Monto Actualizado con exito');
    }

    public function deshabilitar($id)
    {
        $vuelotipo = VueloTipo::find($id);
        if($vuelotipo->status == 0){ // Habilitar
            $vuelotipo->status = 1;
            $vuelotipo->save();
            return redirect()->route('vuelotipos')->with('success', 'Modalidad Activada con Éxito');
        }elseif($vuelotipo->status == 1){ // Deshabilitar
            $vuelotipo->status = 0;
            $vuelotipo->save();
            return redirect()->route('vuelotipos')->with('success', 'Modalidad Desactivada con Éxito');
        }
        
    }

    public function delete($id)
    {
        $vuelotipo = VueloTipo::find($id);
        if($vuelotipo->eliminable == 1){ // Pueden ser borrados
            $vuelotipo = VueloTipo::find($id);
            $vuelotipo->delete();
            return redirect()->route('vuelotipos')->with('success', 'Borrado exitoso');
        }elseif ($vuelotipo->eliminable == 1){ // Originales
            return redirect()->back()->with('error', 'No tiene permitido eliminar esta modalidad.');
        }
    		
    }

}
