<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\AirplanePieza;
use App\Pieza;
use Illuminate\Http\Request;

class AirplanePiezaController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    
    public function create()
    {
        $airplanes = Airplane::where('status',1)->get();
        return view('inventario.airplanepiezas.create', ['airplanes' => $airplanes]);
    }

    
    public function asignarcreate($pieza_id)
    {
        $pieza = Pieza::where('id', $pieza_id)->first();
        $airplanes = Airplane::where('status',1)->get();
        return view('inventario.airplanepiezas.asignarcreate', ['pieza' => $pieza, 'airplanes' => $airplanes]);

    }

    public function asignarstore(Request $request)
    {
        $pieza = Pieza::where('id', $request->pieza_id)->first();
        if (isset($pieza->airplanepieza->id)) {
            return redirect()->back()->with('error', 'La Pieza ya pertenece a un avión');
        }else {

            // Validaciones
            // Que no haya superado su vida útil
            if($request->horasdeuso > $pieza->tbohora){
                return redirect()->back()->with('error', 'TBO Horas es menor que las horas de uso, la pieza ya está vencida. Verifique los datos.');
            }
            // Que se instale en el avión DESPUÉS de su fecha de compra
            if($pieza->fechacompra > $request->fechadeinstalacion){
                return redirect()->back()->with('error', 'La pieza no puede ser instalada ANTES de haber sido comprada. Verifique los datos.');
            }
            // La fecha de instalación no puede superar la fecha en que se vence la pieza
            if($request->fechadeinstalacion >= $pieza->tbofecha){
                return redirect()->back()->with('error', 'La fecha de instalación SUPERA el TBO fecha. Verifique los datos.');
            }

            // Asignando la pieza a su avión
            $airplanepieza = new AirplanePieza();
            $airplanepieza->airplane_id = $request->airplane_id;
            $airplanepieza->pieza_id = $pieza->id;
            $airplanepieza->horasdeuso = $request->horasdeuso;
            $airplanepieza->fechadeinstalacion = $request->fechadeinstalacion;
            $airplanepieza->descripcion = $request->descripcion;
            // Delta deseado entre TBO horas y horasdeuso para enviar notificaciones
            $airplanepieza->notidifusotbo = $request->notidifusotbo; 
            $airplanepieza->save();

        return redirect()->route('airplanes.show',['id' => $request->airplane_id])->with('success', 'Pieza Instalada Exitosamente');
        }
        


    }

}
