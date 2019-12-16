
@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Editar</div>
    </div>
</div>

<!-- PILOTO INDIVIDUAL -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-file-text"></i> Marca de Avión</h4>
                        <form class="form" method="POST" action="{{ route('airplanebrands.update', ['id'=>$airplanebrand->id]) }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="nombre">Escriba el nuevo nombre de {{$airplanebrand->nombre}}</label>
                                    <input type="text" class="form-control" name="nombre" value="{{$airplanebrand->nombre}}">
                                    </div>
                                </div>
                            </div>  
                            <div class="form-actions">
                                
                                <a href="{{ route('airplanebrands') }}">
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
