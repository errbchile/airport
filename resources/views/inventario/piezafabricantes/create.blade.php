@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nueva Marca de Pieza</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('inventario.piezafabricantes.store') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="fas fa-cog"></i> Ingrese El Nombre de la Pieza </h4>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <a href="#">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
                  <button type="submit" class="btn btn-raised btn-raised btn-success">
                    <i class="fa fa-check-square-o"></i> Registrar
                  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection