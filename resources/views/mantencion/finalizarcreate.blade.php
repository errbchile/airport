@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Finalizando La Mantencion N° {{ $mantencion->id }}</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('mantencion.finalizarstore') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">
                <div class="row">
                  <!-- ID de la mantención -->
                  <input hidden type="text" class="form-control" name="id" value="{{ $mantencion->id }}" required>
                  <!-- ID del Mecánico -->
                  <input hidden type="text" class="form-control" name="mecanico_id" value="{{ Auth::user()->id }}" required>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="airplane_id">Avión</label>
                      <input type="text" id="airplane_id" class="form-control" value="{{ $mantencion->airplane->patente }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="airplane_id">Tipo de Mantención</label>
                      <input type="text" id="airplane_id" class="form-control" value="{{ $mantencion->tipo->nombre }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="airplane_id">Fecha de Cierre</label>
                      <input type="date" id="airplane_id" class="form-control" name="fechacierre" required>
                    </div>
                  </div>


                </div>
                <div class="form-actions">
                  <a href="{{ route('mantencion') }}">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
                  <button type="submit" class="btn btn-raised btn-raised btn-primary">
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

@section('custom_js')
<script>
/* Validar el RUT */
$("#rut").rut({formatOn: 'keyup'});
/* Validar el Password */
$( ".pass" ).keyup(function() {
  if ($('#password').val() != $('#password_again').val()) {
    $('#passtexterror').html('La contraseña no coincide');
    $(':input[type="submit"]').prop('disabled', true);
  } else {
    $('#passtexterror').html('');
    $(':input[type="submit"]').prop('disabled', false);
  }
});
</script>
@endsection