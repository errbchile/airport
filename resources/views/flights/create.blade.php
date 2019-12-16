@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nueva Solicitud de Vuelo</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('vuelos.store') }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Información sobre el Vuelo</h4>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="flight_type_id">Tipo de Vuelo</label>
                      <select id="flight_type_id" name="flight_type_id" class="form-control">
                        @foreach ($tipos as $t)
                        <option value="{{$t->id}}">{{$t->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="airplane_id">Patente de Avión a Reservar</label>
                      <select id="airplane_id" name="airplane_id" class="form-control">
                        @foreach ($aviones as $a)
                        <option value="{{$a->id}}">{{$a->patente}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_fecha">Fecha de Salida</label>
                      <div class="position-relative has-icon-left">
                        <input type="date" id="start_fecha" class="form-control" name="start_fecha">
                        <div class="form-control-position">
                          <i class="ft-message-square"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_hora">Hora de Salida</label>
                      <div class="position-relative has-icon-left">
                        <input type="time" id="start_hora" class="form-control" name="start_hora">
                        <div class="form-control-position">
                          <i class="ft-clock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="end_fecha">Fecha de Llegada</label>
                      <div class="position-relative has-icon-left">
                        <input type="date" id="end_fecha" class="form-control" name="end_fecha">
                        <div class="form-control-position">
                          <i class="ft-message-square"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="end_hora">Hora de Llegada</label>
                      <div class="position-relative has-icon-left">
                        <input type="time" id="end_hora" class="form-control" name="end_hora">
                        <div class="form-control-position">
                          <i class="ft-clock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="comentarios">Comentario (opcional)</label>
                  <textarea id="comentarios" rows="5" class="form-control" name="comentarios"></textarea>
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Solicitar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</section>
@endsection