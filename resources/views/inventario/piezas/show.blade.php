@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">{{ $pieza->nombre }}</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="fas fa-cog"></i> Más Detalles de la Pieza</h4>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" value="{{ $pieza->piezatipo->nombre }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fabricante">Marca</label>
                      <input type="text" id="fabricante" class="form-control" value="{{ $pieza->fabricante->nombre }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="airplane_model">Modelo</label>
                      <input type="text" id="airplane_model" class="form-control" value="{{ $pieza->model->nombre }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="partnumber">N° de Parte</label>
                      <input type="text" id="partnumber" class="form-control" value="{{ $pieza->partnumber }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fechacompra">Fecha de Compra</label>
                      <input type="text" id="fechacompra" class="form-control" value="{{ dateformat($pieza->fechacompra) }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="serie">N° de Serie</label>
                      <input type="text" id="serie" class="form-control" value="{{ $pieza->serie }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tbofecha">TBO Fecha</label>
                      <input type="text" id="tbofecha" class="form-control" value="{{ dateformat($pieza->tbofecha) }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tbohora">TBO Horas</label>
                      <input type="text" id="tbohora" class="form-control" value="{{ $pieza->tbohora }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fechacompra">Status</label>
                      <input type="text" id="aaa" class="form-control" value="{{ getTipoPieza($pieza->tipo) }}" readonly>
                    </div>
                  </div>
                  @if($pieza->tipo == 2) <!-- Pertenece a un Avión -->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="aaa">
                          <a href="{{ route('airplanes.show', ['id' => $pieza->airplanepieza->airplane->id]) }}">
                            Avión
                          </a>
                        </label>
                      <input type="text" id="aaa" class="form-control" value="{{ $pieza->airplanepieza->airplane->patente . ' (' . $pieza->airplanepieza->airplane->model->nombre . ' ' . $pieza->airplanepieza->airplane->model->brand->nombre . ')' }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="horasdeuso">Horas de uso</label>
                      <input type="text" id="horasdeuso" class="form-control" value="{{ $pieza->airplanepieza->horasdeuso . ' Hrs' }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fechadeinstalacion">fecha de Instalación</label>
                      <input type="text" id="fechadeinstalacion" class="form-control" value="{{ dateformat($pieza->airplanepieza->fechadeinstalacion) }}" readonly>
                    </div>
                  </div>
                  @endif
                </div>

                <div class="form-actions">
                  <a href="{{ route('inventario.piezas') }}">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection