@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Salida de Vuelo #{{$vuelo->id}}</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('vuelos_salidas.store', ['id' => $vuelo->id]) }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Información sobre Reserva del Vuelo</h4>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="vuelo_tipo_id">Tipo de Vuelo</label>
                      <input type="text" class="form-control" value="{{$vuelo->tipo->nombre}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="airplane_id">Matrícula de Avión</label>
                      <input type="text" class="form-control" value="{{$vuelo->airplane->patente}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_fecha">Fecha de Salida</label>
                      <div class="position-relative">
                        <input type="text" class="form-control" value="{{datetimeformat($vuelo->solicitud->start)}}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_fecha">Fecha de Llegada</label>
                      <div class="position-relative">
                        <input type="text" class="form-control" value="{{datetimeformat($vuelo->solicitud->end)}}" readonly>
                      </div>
                    </div>
                  </div>
                </div>

                

                <h4 class="form-section"><i class="fas fa-plane-departure"></i> Información sobre Salida del Vuelo</h4>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="start_fecha">Paises</label>
                      <div class="position-relative">
                        <select name="country_id" class="form-control">
                          <option disabled>Seleccione un Pais</option>
                          <option value="1">Chile</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="start_fecha">Regiones</label>
                      <div class="position-relative">
                        <select id="region" class="form-control" required>
                            <option selected disabled>Seleccione una Región</option>
                            @foreach ($regions as $region)
                              <option value="{{$region->id}}" {{ defaultSelected('region',$region->id) }}>{{ getFullRegionName($region->id) }}</option>
                            @endforeach  
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="start_fecha">Aeropuerto</label>
                      <div class="position-relative">
                        <select name="airport_id" id="airports" class="form-control" required>
                          <option selected disabled>Seleccione un Aeropuerto</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_fecha">Fecha de Salida real</label>
                      <div class="position-relative has-icon-left">
                        <input type="date" class="form-control" name="fecha" value="{{dateformatCustom($vuelo->solicitud->start,'Y-m-d')}}" required min="{{date('Y-m-d')}}">
                        <div class="form-control-position">
                          <i class="ft-message-square"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_hora">Hora de Salida real</label>
                      <div class="position-relative has-icon-left">
                        <input type="time" class="form-control" name="hora" value="{{ dateformatCustom($vuelo->solicitud->start,'H:i') }}" required>
                        <div class="form-control-position">
                          <i class="ft-clock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_hora">Tacómetro de Salida</label>
                      <div class="position-relative has-icon-left">
                        <input type="number" class="form-control" name="tacometro" min="0" step="0.1" value="{{getLastTacometroByAirplane($vuelo->airplane->id)}}" required>
                        <div class="form-control-position">
                          <i class="fas fa-tachometer-alt"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="end_hora">Pasajeros</label>
                      <div class="position-relative has-icon-left">
                        <select id="pasajeros" name="pasajeros" class="form-control">
                          <?php for ($i=0; $i <= 2; $i++) { ?>
                              <option value="<?= $i; ?>"><?= $i; ?></option>
                          <?php } ?>
                          <?php for ($i=3; $i <= 3; $i++) { ?>
                              <option value="<?= $i; ?>" class="pasajerosextra"><?= $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  @if ($vuelo->tipo->id == 4) <!-- SI EL VUELO ES DE TIPO INSTRUCCIÓN -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="end_fecha">Entrenador</label>
                      <div class="position-relative has-icon-left">
                        <select id="copiloto" name="copiloto" class="form-control">
                          @foreach ($pilotos as $p)
                          <option value="{{$p->user_id}}">{{fullname($p->user_id)}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Iniciar Vuelo
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
<script type="text/javascript">
/* Inicializar */
$(document).ready(function() {
   searchAirport();
});
/* Cuando cambia el Copiloto */ 
$('#copiloto').change(function () {    
    if ($(this).val() != 0) {
        $('#pasajeros').val(0);
        $('.pasajerosextra').attr('disabled', 'disabled');
    }
    if ($(this).val() == 0) {
        $('#pasajeros').val(0);
        $('.pasajerosextra').removeAttr('disabled');
    }
});    
/* Cuando cambia la Región */ 
$(document).on('change','#region', function() {
  searchAirport();
});
function searchAirport() {
  var url = "{{url('/aeropuertos/ajax/select/region')}}/" + $('#region').val() + "/{{$vuelo->piloto->user->piloto->id}}"; 
  $.ajax({
      type: "GET",
      url: url,
      success: function (data) {
        $("#airports").html('');
        $("#airports").append(data);
        $("#airports").trigger('change');        
      }
  }); 
}
</script>
@endsection