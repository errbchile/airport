@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
  <div class="col-sm-12">
    <div class="content-header">Anulando el Vuelo</div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <form class="form" method="POST" action="{{ route('vuelos_rechazos.store', ['vuelo_id' => $vuelo->id]) }}">
          {{ csrf_field() }}
            <div class="form-body">

              <h4 class="form-section"><i class="ft-file-text"></i> ¿Por qué razones desea anular el vuelo?</h4>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tipo">Opciones</label>
                    <select id="tipo" name="tipo" class="form-control">
                        @foreach (listRechazoOpciones() as $key => $value)
                        @if (!isRechazoOpcionesAdmin($key))
                        <option value="{{$key}}">{{$value}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="patente">Matrícula</label>
                    <input type="text" class="form-control" value="{{ $vuelo->airplane->patente . ' (' . $vuelo->airplane->model->nombre . ' ' . $vuelo->airplane->model->brand->nombre . ')' }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" value="{{ datetimeformat($vuelo->solicitud->start) }}" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="comentarios">Comentarios Adicionales</label>
                    <textarea rows="5" class="form-control" name="comentarios"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-raised btn-raised btn-danger">
                  <i class="fa fa-close"></i> Anular Vuelo
                </button>
                <a href="{{ route('vuelos_salidas') }}">
                    <button type="button" class="btn btn-light">
                        <i class="fas fa-chevron-circle-left"></i> Regresar
                    </button>
                </a>
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
