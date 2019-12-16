<?php

namespace App\Http\Controllers;

use App\Mantencion;
use App\MantencionTareaList;
use App\MantencionTipo;
use App\MantencionTipoTarea;
use App\Notification;
use App\Airplane;
use Illuminate\Http\Request;

class MantencionController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $mantencions = Mantencion::where('status', 0)->orWhere('status',1)->orWhere('status',3)->get();
        return view('mantencion.index', ['mantencions'=>$mantencions]);
    }

    public function create($notification_id = null)
    {
        if ($notification_id != null) {
            $notification = Notification::find($notification_id);
            $airplanes = Airplane::all();
            $mantenciontipos = MantencionTipo::all();
            return view('mantencion.create', ['airplanes'=>$airplanes, 'mantenciontipos'=>$mantenciontipos, 'notification'=>$notification]);
        }

        $airplanes = Airplane::all();
        $mantenciontipos = MantencionTipo::all();
        return view('mantencion.create', ['airplanes'=>$airplanes, 'mantenciontipos'=>$mantenciontipos]);
    }

    public function store(Request $request)
    {
        $airplane = Airplane::find($request->airplane_id);
        $mantencion = new Mantencion();
        $mantencion->airplane_id = $request->airplane_id;
        $mantencion->mantencion_tipo_id = $request->mantencion_tipo_id;
        $mantencion->fechasolicitud = date('Y-m-d');
        $mantencion->tacometro = $airplane->horasdevuelo;
        $mantencion->comentarios = $request->comentarios;
        $mantencion->status = 0; // Status "Solicitud"
        $airplane->status = 
        $mantencion->save();

        // Avión No Aeronavegable:
        $airplane->status = 3;
        $airplane->save();
        
        return redirect()->route('mantencion')->with('success', 'Mantención Registrada Exitosamente');
    }

    public function show($id)
    {
        $mantencion = Mantencion::find($id);
        $mantencion_tipo_id = $mantencion->mantencion_tipo_id;
        $tareas = MantencionTareaList::where('status', 1)
                ->whereHas('tipos', function($q) use ($mantencion_tipo_id) {
                    $q->where('status',1)->where('mantencion_tipo_id', $mantencion_tipo_id);
                })
                ->get();
        return view('mantencion.show', ['mantencion'=>$mantencion, 'tareas'=>$tareas]);
    }

    public function historico()
    {
        $mantenciones = Mantencion::where('status', 2)->get(); // Finalizadas
        return view('mantencion.historico', ['mantenciones'=>$mantenciones]);
    }

    public function iniciar(Request $request)
    {

        $mantencion = Mantencion::find($request->id);
        $airplane = Airplane::find($mantencion->airplane_id);
        // Si el avión está fuera de servicio:
        if($airplane->status == 3){ 
            $mantencion->status = 1; // Mantención "En Proceso"
            $mantencion->save();
            //Cambia el status del avión a "En Mantención":
            $airplane->status = 2;
            $airplane->save();
        return redirect()->route('mantencion.show', ['id' => $mantencion->id])->with('success', 'Mantención Iniciada Exitosamente');    
        }else{
            return redirect()->back()->with('error', 'El Avión aún se Encuentra Habilitado para volar.');    
        }
    }

    public function finalizarcreate($id)
    {

        $mantencion = Mantencion::find($id);
        return view('mantencion.finalizarcreate', ['mantencion'=>$mantencion]);  
    }

    public function finalizarstore(Request $request)
    {
        $mantencion = Mantencion::find($request->id);
        $airplane = Airplane::find($mantencion->airplane_id);
        $mantencion->status = 2; //Mantención Finalizada
        $mantencion->fechacierre = $request->fechacierre;
        $mantencion->save();

        // Averiguando si hay más mantenciones pendientes para este avión:
        $mantencionespendientes = Mantencion::where('airplane_id', $airplane->id)->first();
        if ($mantencionespendientes == null) {
            $airplane->status = 1; // Avión Habilitado
            $airplane->save();
            return redirect()->route('mantencion.historico')->with('success', 'Mantención Finalizada con Éxito. El avión queda Aeronavegable');  
        }else{
            return redirect()->route('mantencion.historico')->with('success', 'Mantención Finalizada con Éxito. Sin embargo, hay Mantenciones pendientes para dicho Avión.');  
        }  
    }

    public function update(Request $request, Mantencion $mantencion)
    {
        //
    }

    public function destroy(Mantencion $mantencion)
    {
        //
    }
}
