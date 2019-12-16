@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Crear Nueva Mantención</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('mantencion.store') }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Registre aquí los datos para la nueva solicitud de mantención </h4>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="airplane_id">Avión</label>
                      <select id="airplane_id" name="airplane_id" class="form-control" required>
                        @foreach ($airplanes as $a)
                          <option value="{{$a->id}}">{{$a->patente . " (" . $a->model->nombre . " " . $a->model->brand->nombre . ") " . "Horas de Vuelo: " . $a->horasdevuelo . " - " . getAirplaneStatus($a->status)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="mantencion_tipo_id">Tipo de Mantención</label>
                      <select id="mantencion_tipo_id" name="mantencion_tipo_id" class="form-control" required>
                        @foreach ($mantenciontipos as $mantipo)
                          <option value="{{$mantipo->id}}">{{$mantipo->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                @if(isset($notification))
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="comentarios">Comentarios</label>
                      <input type="text" name="comentarios" class="form-control" value="{{ $notification->detalle }}" readonly>
                    </div>
                  </div>
                </div>
                @elseif(!isset($notification))
                <div class="form-group">
                  <label for="comentarios">Comentarios</label>
                  <textarea class="form-control" name="comentarios"></textarea>
                </div>
                @endif
              <div class="form-actions">
                <button type="submit" class="btn btn-raised btn-raised btn-success">
                  <i class="fa fa-check-square-o"></i> Registrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</section>
@endsection