<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\AirplaneModel;
use App\AirplanePieza;
use App\Pieza;
use App\PiezaFabricante;
use App\PiezaTipo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PiezaController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $piezas = Pieza::where('status',1)->get();
        $fabricantes = PiezaFabricante::where('status',1)->get();
        $piezasenuso = Pieza::where('tipo',2)->get();
        $piezasenbodega = Pieza::where('status',1)->where('tipo',1)->get();
        return view('inventario.piezas.index', ['piezas'=>$piezas, 'piezasenuso'=>$piezasenuso, 'piezasenbodega'=>$piezasenbodega, 'fabricantes'=>$fabricantes]);
    }

    public function create($airplane_id = null)
    {
        if($airplane_id == true){
            $airplaneurl = Airplane::where('id', $airplane_id)->first();    
            $piezatipos = PiezaTipo::where('status',1)->get();
            $airplanemodels = AirplaneModel::where('status',1)->get();
            $fabricantes = PiezaFabricante::where('status',1)->get();

            $piezassinavion = Pieza::whereDoesntHave('airplanepieza', function (Builder $query) {
                $query->where('status', 1);
            })->get();

            return view('inventario.piezas.create', ['airplanemodels' => $airplanemodels, 'piezatipos' => $piezatipos, 'airplaneurl' => $airplaneurl, 'piezassinavion' => $piezassinavion, 'fabricantes' => $fabricantes]);
        }
        $fabricantes = PiezaFabricante::where('status',1)->get();
        $airplanes = Airplane::where('status',1)->get();
        $piezatipos = PiezaTipo::where('status',1)->get();
        $airplanemodels = AirplaneModel::where('status',1)->get();
        return view('inventario.piezas.create', ['airplanemodels' => $airplanemodels, 'piezatipos' => $piezatipos, 'airplanes' => $airplanes, 'fabricantes' => $fabricantes]);
    }

    public function store(Request $request)
    {
        //Validaciones
        //Fecha de vencimiento de la pieza
        if($request->tbofecha < $request->fechacompra){
            return redirect()->back()->with('error', 'La fecha de compra es mayor a TBO Fecha');
        }

        // Pieza Vencida
        if($request->tbofecha < date('Y-m-d')){
            return redirect()->back()->with('error', 'TBO Fecha es menor que la fecha actual, por lo tanto la pieza ha caducado');
        }

        // Registrando Pieza Nueva
        $pieza = new Pieza();
        $pieza->pieza_tipo_id = $request->pieza_tipo_id;
        $pieza->pieza_fabricante_id = $request->pieza_fabricante_id;
        $pieza->airplane_model_id = $request->airplane_model_id;
        $pieza->partnumber = $request->partnumber;
        $pieza->fechacompra = $request->fechacompra;
        $pieza->serie = $request->serie;
        $pieza->tbofecha = $request->tbofecha;
        $pieza->tbohora = $request->tbohora;
        //Por si acaso actualizan la vista y Jquery no deselecciona "en uso":
        $pieza->tipo = 1;
        $pieza->save();
        
            // Asignándola al Avión
        if (isset($request->horasdeuso)) {
            // Validaciones
            // Que no haya superado su vida util
            if($request->horasdeuso > $request->tbohora){
                return redirect()->back()->with('error', 'TBO Horas es menor que las horas de uso, la pieza ya está vencida');
            }
            // Que se instale en el avión DESPUÉS de su fecha de compra
            if($request->fechacompra > $request->fechadeinstalacion){
                return redirect()->back()->with('error', 'La pieza no puede ser instalada ANTES de haber sido comprada. Verifique los datos.');
            }
            // La fecha de instalación no puede superar la fecha en que se vence la pieza
            if($request->fechadeinstalacion >= $request->tbofecha){
                return redirect()->back()->with('error', 'La fecha de instalación SUPERA el TBO fecha. verifique los datos.');
            }

            // Asignándole la pieza la avión
            $airplanepieza = new Airplanepieza();
            $airplanepieza->airplane_id = $request->airplane_id;
            $airplanepieza->pieza_id = $pieza->id;
            $airplanepieza->horasdeuso = $request->horasdeuso;
            // Delta deseado entre TBO horas y horasdeuso para enviar notificaciones
            $airplanepieza->notidifusotbo = $request->notidifusotbo;
            $airplanepieza->fechadeinstalacion = $request->fechadeinstalacion;
            $airplanepieza->save();
            // En este nivel el "tipo" de pieza debería ser 2 (en uso), pero por si acaso:
            $jqueryerror = Pieza::find($pieza->id);
            $jqueryerror->tipo = 2;
            $jqueryerror->save();

        }

        return redirect()->route('inventario.piezas.show',['id' => $pieza->id])->with('success', 'Pieza Registrada Exitosamente');
    }

    public function show($id)
    {
        $pieza = Pieza::find($id);
        return view('inventario.piezas.show', ['pieza'=>$pieza]);
    }

    public function edit(Pieza $pieza)
    {
        //
    }

    public function update(Request $request, Pieza $pieza)
    {
        //
    }

    public function destroy(Pieza $pieza)
    {
        //
    }
}
