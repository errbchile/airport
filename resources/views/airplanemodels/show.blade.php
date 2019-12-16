@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Modelo de Avión</div>
    </div>
</div>

<!-- Modelo de avión -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <div class="form-body">

                    <h4 class="form-section"><i class="ft-file-text"></i> Detalles</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Modelo</label>
                            <input type="text" id="nombre" class="form-control" name="nombre" value="{{$airplanemodel->nombre}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="brand">Marca</label>
                            <input type="text" id="brand" class="form-control" name="brand" value="{{$airplanemodel->brand->nombre}}"  readonly>
                            </div>
                        </div>
                    </div>  
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{route('airplanemodels.edit', ['id' => $airplanemodel->id])}}"><button type="button" class="btn btn-raised btn-info"> Editar <i class="fa fa-edit"></i></button></a>
                    </div>
            </div>
        </div>
    </div>
</div>
    
    </section>
    @endsection