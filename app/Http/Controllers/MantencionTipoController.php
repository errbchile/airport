<?php

namespace App\Http\Controllers;

use App\Mantencion;
use App\MantencionTipo;
use App\MantencionTipoTarea;
use App\MantencionTareaList;
use Illuminate\Http\Request;

class MantencionTipoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $tipos = MantencionTipo::where('status',1)->orWhere('status',0) ->get();
        return view('mantencion.tipos.index', ['tipos'=>$tipos]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tarea = new MantencionTipo();
        $tarea->nombre = $request->descripcion;
        $tarea->save();

        return redirect()->route('mantencion.tipos')->with('success', 'Tipo de Mantención Registrado Exitosamente');
    }

    public function show($id)
    {
        $tipo = MantencionTipo::find($id);
        return view('mantencion.tipos.show', ['tipo'=>$tipo]);
    }

    
    public function edit($id)
    {
        $tipo = MantencionTipo::find($id);
        $tareas = MantencionTareaList::where('status',1)->get();
        return view('mantencion.tipos.edit', ['tipo'=>$tipo, 'tareas'=>$tareas]);
    }

    
    public function update(Request $request, MantencionTipoTarea $mantenciontipotarea)
    {
        // Borrando Las Tareas en la tabla MantencionTipoTarea
        $mantenciontipotarea = MantencionTipoTarea::where('mantencion_tipo_id', $request->id)->delete();

        //Registrando las Nuevas Tareas en Los Tipos de Mantenciones
        if($request->tipotareas != null) {
            foreach ($request->tipotareas as $tipotarea){
                $mantenciontipotarea = new MantencionTipoTarea();
                $mantenciontipotarea->mantencion_tipo_id = $request->id;
                $mantenciontipotarea->mantencion_tarea_list_id = $tipotarea;
                $mantenciontipotarea->save();
            }
        }
        return redirect()->route('mantencion.tipos.edit', ['id' => $request->id])->with('success', 'Actualización Exitosa');
    }

    public function deshabilitar($id)
    {
        $mantenciontipo = MantencionTipo::find($id);
        if($mantenciontipo->status == 0){ // Habilitar
            $mantenciontipo->status = 1;
            $mantenciontipo->save();
            return redirect()->route('mantencion.tipos')->with('success', 'Activado con Éxito');
        }elseif($mantenciontipo->status == 1){ // Deshabilitar
            //Validación:
            // Que no tenga Mantenciones relacionadas
            $mantencionesrelacionadas = Mantencion::where('mantencion_tipo_id', $mantenciontipo->id)->first();
            // Que no tenga Tareas relacionadas
            $tareasrelacionadas = MantencionTipoTarea::where('mantencion_tipo_id', $mantenciontipo->id)->first();
            if ($mantencionesrelacionadas == null && $tareasrelacionadas == null){
                $mantenciontipo->status = 0;
                $mantenciontipo->save();
                return redirect()->route('mantencion.tipos')->with('success', 'Desactivado con Éxito');
            }else{
                return redirect()->back()->with('error', 'No se puede deshabilitar porque hay Mantenciones o tareas registradas en el sistema relacionadas a este tipo de mantención');
            }
            
        }
        
    }

    public function delete($id)
    {
        $mantenciontipo = MantencionTipo::find($id);
        if($mantenciontipo->eliminable == 1){ // Pueden ser borrados
            //Validación:
            // Que no tenga Mantenciones relacionadas
            $mantencionesrelacionadas = Mantencion::where('mantencion_tipo_id', $mantenciontipo->id)->first();
            if ($mantencionesrelacionadas == null) {
                // Borrar Tipo de Mantencion (Status 3)
                $mantenciontipo = MantencionTipo::find($id);
                $mantenciontipo->status = 3;
                $mantenciontipo->save();
                return redirect()->route('mantencion.tipos')->with('success', 'Borrado Exitoso');
            }else{
                return redirect()->back()->with('error', 'No se puede borrar porque hay Mantenciones registradas en el sistema relacionadas a este tipo de mantención');
            }
        }elseif ($mantenciontipo->eliminable == 1){ // Originales
            return redirect()->back()->with('error', 'No tiene permitido eliminar esta modalidad.');
        }    
    }

    
    public function destroy(MantencionTipo $mantencionTipo)
    {
        //
    }
}
