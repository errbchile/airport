<?php

namespace App\Http\Controllers;

use App\MantencionTareaList;
use App\MantencionTipoTarea;
use Illuminate\Http\Request;

class MantencionTareaListController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $tareas = MantencionTareaList::where('status',1)->orWhere('status',0)->get();
        return view('mantencion.tareas.index', ['tareas'=>$tareas]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tarea = new MantencionTareaList();
        $tarea->descripcion = $request->descripcion;
        $tarea->save();

        return redirect()->route('mantencion.tarealists')->with('success', 'Tarea Registrada Exitosamente');
    }

    public function deshabilitar($id)
    {
        $tarea = MantencionTareaList::find($id);
        if($tarea->status == 0){ // Habilitar
            $tarea->status = 1;
            $tarea->save();
            return redirect()->route('mantencion.tarealists')->with('success', 'Activado con Éxito');
        }elseif($tarea->status == 1){ // Deshabilitar
            $tarea->status = 0;
            $tarea->save();
            return redirect()->route('mantencion.tarealists')->with('success', 'Desactivado con Éxito');
        }
        
    }

    public function delete($id)
    {
        $tarea = MantencionTareaList::find($id);
        if($tarea->eliminable == 1){ // Pueden ser borrados
            //Validación:
            // Que no tenga piezas relacionadas
            $tiposrelacionados = MantencionTipoTarea::where('mantencion_tarea_list_id', $tarea->id)->first();
            if ($tiposrelacionados == null) {
                // Borrar Tipo de Pieza (Status 3)
                $tarea = MantencionTareaList::find($id);
                $tarea->status = 3;
                $tarea->save();
                return redirect()->route('mantencion.tarealists')->with('success', 'Borrado Exitoso');
            }else{
                return redirect()->back()->with('error', 'No se puede borrar porque hay Tipos de mantenciones relacionadas a esta tarea.');
            }
        }elseif ($tarea->eliminable == 1){ // Originales
            return redirect()->back()->with('error', 'No tiene permitido eliminar esta tarea.');
        }    
    }

    public function show(MantencionTareaList $mantencionTareaList)
    {
        //
    }

    public function edit(MantencionTareaList $mantencionTareaList)
    {
        //
    }

    public function update(Request $request, MantencionTareaList $mantencionTareaList)
    {
        //
    }

    public function destroy(MantencionTareaList $mantencionTareaList)
    {
        //
    }
}
