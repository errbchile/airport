@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nuevo Modelo</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('airplanemodels.store') }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Registre el Nuevo Modelo </h4>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Modelo</label>
                      <input type="text" id="nombre" class="form-control" name="nombre" required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="airplane_brand_id">Marca</label>
                      <select name="airplane_brand_id" id="airplane_brand_id" class="form-control" required>
                          @foreach ($airplanebrands as $r)
                          <option value="{{$r->id}}">{{$r->nombre}}</option>    
                          @endforeach
                        </select>
                    </div>
                  </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-raised btn-raised btn-success">
                  <i class="fa fa-check-square-o"></i> Registrar Modelo
                </button>

                <a href="{{ route('airplanebrands.create') }}">
                  <button type="button" class="btn btn-raised btn-raised btn-info">
                    Crear Marca
                  </button>
                </a>

                <a href="{{ route('airplanes') }}">
                  <button type="button" class="btn btn-light">
                    <i class="fas fa-chevron-circle-left"></i> Atrás
                  </button>
                </a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</section>
@endsection