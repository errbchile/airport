
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
                        <h4 class="form-section"><i class="ft-file-text"></i> Modelo</h4>
                        <form class="form" method="POST" action="{{ route('airplanemodels.update', ['id'=>$airplanemodel->id]) }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="nombre">Modelo</label>
                                    <input type="text" class="form-control" name="nombre" value="{{$airplanemodel->nombre}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="airplane_brand_id">Marca</label>
                                        <select id="airplane_brand_id" name="airplane_brand_id" class="form-control">
                                            @foreach ($airplanebrands as $a)
                                            <option value="{{$a->id}}" {{isSelected($a->id,$airplanemodel->airplane_brand_id)}}>{{$a->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-actions">
                                <a href="{{ route('airplanemodels') }}">
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
