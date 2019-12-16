<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Piloto;
use App\PilotoSaldo;
use App\Vuelo;
use Illuminate\Http\Request;

class PilotoSaldoController extends Controller
{

    public function create($piloto_id, $vuelo_id = null)
    {
        if($vuelo_id != null){
            $vuelo = Vuelo::find($vuelo_id);    
            $piloto = Piloto::find($piloto_id);
            return view('pilotosaldos.create', ['piloto'=>$piloto, 'vuelo'=>$vuelo]);
        }
        $piloto = Piloto::find($piloto_id);
        return view('pilotosaldos.create', ['piloto'=>$piloto]);
    }

    public function store(Request $request)
    {
        //Guarda en la Cuenta Corriente de Saldos del Piloto
        $antiguosaldo = PilotoSaldo::where('piloto_id', $request->piloto_id)->orderBy('fecha', 'desc')->first();
        $pilotosaldo = new PilotoSaldo();
        $pilotosaldo->piloto_id = $request->piloto_id;
        $pilotosaldo->monto = $request->monto;
        // Si Es la primera vez que ingresa saldo
        if($antiguosaldo == null){
            $pilotosaldo->saldoactual = $request->monto;
        }else{
            $pilotosaldo->saldoactual = $antiguosaldo->saldoactual + $request->monto;
        }
        $pilotosaldo->fecha = Carbon::now();
        if ($request->descripcion == null OR $request->descripcion == '') {$descripcion='Sin Descripción.';}
        else {$descripcion = $request->descripcion;}
        $pilotosaldo->descripcion = $descripcion;
        $pilotosaldo->tipo = 1;
        $pilotosaldo->forma_pago = $request->forma_pago;
        $pilotosaldo->save();

        //Actualiza el Saldo en la Tabla Piloto
        $piloto = Piloto::find($request->piloto_id);
        $piloto->saldo = $pilotosaldo->saldoactual;
        $piloto->save();
        //Return
        return redirect()->route('pilotos.show', ['id' => $request->piloto_id])->with('success', 'Monto Agregado Exitosamente');
    }

}
