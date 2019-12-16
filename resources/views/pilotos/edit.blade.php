
@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Detalles</div>
    </div>
</div>

<!-- PILOTO INDIVIDUAL -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-file-text"></i> Piloto</h4>
                        <form class="form" method="POST" action="{{ route('pilotos.update', ['id' => $piloto->id]) }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="rut">Rut</label>
                                    <input type="text" class="form-control" name="rut" value="{{$piloto->user->rut}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="nombre">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" value="{{fullname($piloto->user->id)}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="piloto_tipo">Rol</label>
                                        <div class="position-relative">
                                            <input type="text" id="start_hora" class="form-control" name="piloto_tipo" value="{{$piloto->tipo->nombre}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vuelo_horas">Horas de vuelo</label>
                                        <div class="position-relative">
                                            <input type="text" id="end_fecha" class="form-control" name="vuelo_horas" value="{{$piloto->horasdevuelo}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="position-relative">
                                            <input type="text" id="email" class="form-control" name="email" value="{{$piloto->user->email}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <div class="position-relative">
                                            <input type="text" id="end_hora" class="form-control" name="telefono" value="{{$piloto->user->telefono}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="saldoActual">Saldo Actual</label>
                                        <div class="position-relative">
                                            <input type="text" id="end_hora" class="form-control" name="saldoActual" value="{{clp($piloto->saldo)}}" readonly>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="saldoActual">Tipo de Licencia</label>
                                        <select name="licencia_tipo" class="form-control">
                                            @foreach (listLicenciaTipo() as $key => $value)
                                            <option value="{{$key}}" {{isSelected($key,$piloto->licencia_tipo)}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                 </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="licencia_end">La Licencia inicia el</label>
                                        <div class="position-relative">
                                            <input type="date" id="licencia_start" class="form-control" name="licencia_start" value="{{$piloto->licencia_start}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="licencia_end">La Licencia caduca el</label>
                                        <div class="position-relative">
                                            <input type="date" id="licencia_end" class="form-control" name="licencia_end" value="{{$piloto->licencia_end}}" min="{{$piloto->licencia_start}}" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                    <i class="fa fa-check-square-o"></i> Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section>
@endsection