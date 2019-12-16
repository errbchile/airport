@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
  <div class="col-sm-12">
    <div align="center" class="content-header">Asignar/Instalar Pieza</div>
  </div>
</div>

<!-- Agregar Pieza al avión Y al inventario -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <form id="myform" class="form" method="POST" action="{{ route('inventario.airplanepiezas.asignarstore', ['pieza_id' => $pieza->id]) }}" autocomplete="form">
            {{ csrf_field() }}
            <div class="form-body">

              <h4 class="form-section"><i class="fas fa-cog"></i> Ingrese Los Datos Requeridos De La Nueva Pieza que desea Instalar/Asignar </h4>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="pieza_tipo_id">Nombre</label>
                    <input type="text" id="pieza_tipo_id" class="form-control" value="{{ $pieza->piezatipo->nombre }}" readonly>
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
                    <label for="partnumber">N° de Parte</label>
                    <input type="text" id="partnumber" class="form-control" value="{{ $pieza->partnumber }}"readonly>
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
                    <label for="tipo">En Bodega</label>
                    <input type="text" id="tipo" class="form-control" value="{{ $pieza->tipo }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="airplane">Avión</label>
                    <select id="airplane" name="airplane_id" class="form-control">
                      @foreach ($airplanes as $a)
                        <option value="{{ $a->id }}">{{ $a->patente . " (" . $a->model->nombre . " " . $a->model->brand->nombre . ")" }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="horasdeuso">Horas de uso de la pieza</label>
                    <input type="number" id="horasdeuso" min="0" step="1" class="form-control" value="{{ old('horasdeuso') }}" name="horasdeuso" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechadeinstalacion">fecha de Instalación</label>
                    <input type="date" id="fechadeinstalacion" class="form-control" value="{{ old('fechadeinstalacion') }}" name="fechadeinstalacion" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <h1 class="form-section"> Usted recibirá notificaciones <strong>antes</strong> de que las horas de uso alcancen el TBO horas:</h1>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="notidifusotbo">Cuántas horas antes del TBO horas desea la notificación</label>
                    <input type="number" id="notidifusotbo" class="form-control" min="1" step="1" name="notidifusotbo" required>
                  </div>
                </div>
              </div>  
              <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea class="form-control" name="descripcion"></textarea>
              </div>
              <div class="form-actions">
                <a href="{{ route('inventario.piezas') }}">
                    <button type="button" class="btn btn-raised btn-raised btn-light">
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