
@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Editar</div>
    </div>
</div>

<!-- AVIÓN INDIVIDUAL -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-file-text"></i> Avión {{$airplane->patente}} Modelo {{ " (" . $airplane->model->nombre . ")" }}</h4>
                        <form class="form" method="POST" action="{{ route('airplanes.update', ['id'=>$airplane->id]) }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="patente">Matrícula</label>
                                        <input type="text" class="form-control" name="patente" value="{{$airplane->patente}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="airplane_model_id">Modelo</label>
                                        <select id="airplane_model_id" name="airplane_model_id" class="form-control">
                                            @foreach ($models as $mo)
                                            <option value="{{$mo->id}}" {{isSelected($mo->id,$airplane->airplane_model_id)}}>{{$mo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="permiso">Permiso</label>
                                        <select name="permiso" id="permiso" class="form-control" required>
                                            @for ($i = 1950; $i <= 2050; $i++)
                                                <option value="{{ $i }}" {{ isSelected($i ,$airplane->permiso) }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vencimiento">Vencimiento</label>
                                        <input type="date" class="form-control" name="vencimiento"  value="{{$airplane->vencimiento}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="horasactuales">Horas Actuales</label>
                                        <input type="text" class="form-control" name="horasactuales" value="{{$airplane->horasactuales}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="horasdevuelo">Horas de Vuelo</label>
                                        <input type="text" class="form-control" name="horasdevuelo" value="{{$airplane->horasdevuelo}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vuelos">N° de Vuelos Realizados</label>
                                        <input type="text" class="form-control" id="vuelos" value="{{ count($airplane->vuelos) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                                <option value="1">Habilitado</option>
                                                <option value="2">En Mantenimiento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>  

                            <div class="form-actions">
                                <a href="{{ route('airplanes.show', ['id'=>$airplane->id]) }}">
                                    <button type="button" class="btn btn-light">
                                        <i class="fas fa-chevron-circle-left"></i> Regresar
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-raised btn-raised btn-success">
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
