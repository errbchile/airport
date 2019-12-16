@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nuevo Piloto del Club</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('pilotos.store') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="fa fa-male"></i> Ingrese los datos del nuevo piloto </h4>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="rut">RUT</label>
                      <input type="text" id="rut" class="form-control" name="rut" value="{{ old('rut') }}" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="name">Nombres</label>
                      <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="lastname_paterno">Apellido Paterno</label>
                      <input type="text" id="lastname_paterno" class="form-control" value="{{ old('lastname_paterno') }}" name="lastname_paterno" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="lastname_materno">Apellido Materno</label>
                      <input type="text" id="lastname_materno" class="form-control" value="{{ old('lastname_materno') }}" name="lastname_materno" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="telefono">Teléfono</label>
                      <div class="position-relative">
                        <input type="number" id="telefono" class="form-control" name="telefono" placeholder="987654321" min='0' max='999999999' value="{{ old('telefono') }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="saldo">Saldo Inicial</label>
                      <div class="position-relative">
                        <input type="number" id="saldo" class="form-control" name="saldo" min="0" step="500" value="{{ old('saldo') }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="horasdevuelo">Horas de Vuelo</label>
                      <div class="position-relative">
                        <input type="number" class="form-control" name="horasdevuelo" value="{{ old('horasdevuelo') }}" min="0" step="0.1" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="piloto_tipo_id">Rol</label>
                      <select id="piloto_tipo_id" name="piloto_tipo_id" class="form-control">
                        @foreach ($pilototipo as $a)
                        <option value="{{$a->id}}">{{$a->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="saldoActual">Tipo de Licencia</label>
                          <select name="licencia_tipo" class="form-control">
                              @foreach (listLicenciaTipo() as $key => $value)
                              <option value="{{$key}}">{{$value}}</option>
                              @endforeach
                            </select>
                      </div>
                   </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="licencia_end">La Licencia inicia el</label>
                          <div class="position-relative">
                              <input type="date" id="licencia_start" class="form-control" name="licencia_start" value="{{ old('licencia_start') }}" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="licencia_end">La Licencia caduca el</label>
                          <div class="position-relative">
                              <input type="date" id="licencia_end" class="form-control" name="licencia_end" value="{{ old('licencia_end') }}" required>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <div class="position-relative">
                        <input type="email" placeholder="mail@mail.com" id="email" class="form-control" value="{{ old('email') }}" name="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="password">Contraseña</label>
                      <div class="position-relative">
                        <input type="password" id="password" class="form-control pass" name="password" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="password">Confirmar Contraseña</label>
                      <div class="position-relative">
                        <input type="password" id="password_again" class="form-control pass" required>
                        <p id="passtexterror" style="color: red;"></p>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="form-actions">
                  <a href="{{ route('pilotos') }}">
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