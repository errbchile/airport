<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\AirplaneModel;
use App\Piloto;
use App\PilotoAirplaneModel;
use App\PilotoHora;
use App\PilotoSaldo;
use App\PilotoTipo;
use App\User;
use App\Vuelo;
use App\VueloUser;
use Illuminate\Http\Request;

class PilotoController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $users = User::where('status',1)
                        ->where('rol',1)
                        ->get();
        return view('pilotos.index', ['users'=>$users]);
    }

    public function create()
    {
        $pilototipo = PilotoTipo::where('status',1)->get();
        $airplanemodels = AirplaneModel::where('status',1)->get();
        return view('pilotos.create', ['airplanemodels' => $airplanemodels, 'pilototipo' => $pilototipo]);
    }

    public function store(Request $request)
    {
    	$user = new User();
        $user->rut = $request->rut;
        $user->name = $request->name;
        $user->lastname_paterno = $request->lastname_paterno;
        $user->lastname_materno = $request->lastname_materno;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->password = Hash::make($request['password']);
        $user->save();
        $piloto = new Piloto();
        $piloto->user_id = $user->id;
        $piloto->horasdevuelo = $request->horasdevuelo;
        $piloto->saldo = $request->saldo;
        $piloto->piloto_tipo_id = $request->piloto_tipo_id;
        $piloto->licencia_start = $request->licencia_start;
        $piloto->licencia_end = $request->licencia_end;
        $piloto->licencia_tipo = $request->licencia_tipo;
        $piloto->save();
        $ph = new PilotoHora();
        $ph->piloto_id = $piloto->id;
        $ph->fecha = date('Y-m-d H:i:s');
        $ph->horas = $request->horasdevuelo;
        $ph->acumuladas = $request->horasdevuelo;
        $ph->descripcion = 'Carga Inicial';
        $ph->tipo = 0;
        $ph->save();
        $ps = new PilotoSaldo();
        $ps->piloto_id = $piloto->id;
        $ps->fecha = date('Y-m-d H:i:s');
        $ps->monto = $request->saldo;
        $ps->saldoactual = $request->saldo;
        $ps->descripcion = 'Carga Inicial';
        $ps->tipo = 0;
        $ps->forma_pago = 0;
        $ps->save();
        return redirect()->route('pilotos.show',['id' => $piloto->id])->with('success', 'Piloto Registrado Exitosamente');
    }

    public function show($id)
    {
        $piloto = Piloto::find($id);
        return view('pilotos.show', ['piloto'=>$piloto]);
    }

    public function edit($id)
    {
        $piloto = Piloto::find($id);
        return view('pilotos.edit', ['piloto'=>$piloto]);
    }

    public function update(Request $request)
    {
        $piloto = Piloto::find($request->id);
        $piloto->licencia_start = $request->licencia_start;
        $piloto->licencia_end = $request->licencia_end;
        $piloto->licencia_tipo = $request->licencia_tipo;
        $piloto->user->telefono = $request->telefono;
        $piloto->save();
        $piloto->user->email = $request->email;
        $piloto->user->save();
        return redirect()->route('pilotos.show', ['id' => $request->id])->with('success', 'Actualización exitosa');
    }
}
