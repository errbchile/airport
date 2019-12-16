@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nueva Marca</div>
    </div>
  </div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <form class="form" method="POST" action="{{ route('airplanebrands.store') }}">
            {{ csrf_field() }}
            <div class="form-body">
              <h4 class="form-section"><i class="ft-file-text"></i> Registre la nueva marca </h4>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" name="nombre" required>
                    </div>
                  </div>
              </div>

              <div class="form-actions">
                <a href="{{ route('airplanemodels') }}">
                    <button type="button" class="btn btn-light">
                        <i class="fas fa-chevron-circle-left"></i> Regresar
                    </button>
                </a>
                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Registrar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
@endsection
