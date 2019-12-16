@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
  <div class="col-sm-12">
    <div align="center" class="content-header">Nueva Pieza de Aeronave</div>
  </div>
</div>

<!-- Listado General de piezas EN el Inventario -->
@if(isset($airplaneurl))
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 align="center" class="card-title">Piezas en el Inventario</h4>
          <p align="center" class="card-text">A continuación todas las piezas en el Inventario que esperan ser usadas</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fabricante</th>
                  <th>Modelo <br>Avión</th>
                  <th style="display:none">N° de Parte</th>
                  <th style="display:none">Fecha de Compra</th>
                  <th style="display:none">N° de Serie</th>
                  <th>TBO <br>Fecha</th>
                  <th>TBO <br>Horas</th>
                  <th>Status</th> 
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($piezassinavion as $pi)
                <tr align="center">
                  <td>{{ $pi->id }}</td>
                  <td>{{ $pi->piezatipo->nombre }}</td>
                  <td>{{ $pi->fabricante->nombre }}</td>
                  <td>{{ $pi->model->nombre }}</td>
                  <td style="display:none">{{ $pi->partnumber }}</td>
                  <td style="display:none">{{ $pi->fechacompra }}</td>
                  <td style="display:none">{{ $pi->serie }}</td>
                  <td>{{ $pi->tbofecha }}</td>
                  <td>{{ $pi->tbohora }}</td>
                  <td>{{ getTipoPieza($pi->tipo) }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="{{ route('inventario.airplanepiezas.asignarcreate', ['pieza_id' => $pi->id]) }}">
                        <button type="button" class="btn-sm btn-raised btn-info"><i class="fa fa-check-square-o"></i> Asignar Avión</button>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fabricante</th>
                  <th>Modelo <br>Avión</th>
                  <th style="display:none">N° de Parte</th>
                  <th style="display:none">Fecha de Compra</th>
                  <th style="display:none">N° de Serie</th>
                  <th>TBO <br>Fecha</th>
                  <th>TBO <br>Horas</th>
                  <th>Status</th> <!-- En Uso o Guardada en la Bodega -->
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

<!-- Agregar Pieza al avión Y al inventario -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <form id="myform" class="form" method="POST" action="{{ route('inventario.piezas.store') }}" autocomplete="form">
            {{ csrf_field() }}
            <div class="form-body">

              <h4 class="form-section"><i class="fas fa-cog"></i> Ingrese Los Datos De La Nueva Pieza Para El Inventario </h4>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="pieza_tipo_id">Tipo</label>
                    <select id="pieza_tipo_id" name="pieza_tipo_id" class="form-control" required>
                      @foreach ($piezatipos as $pi)
                      <option value="{{$pi->id}}">{{ $pi->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fabricante">Marca</label>
                    <select id="fabricante" name="pieza_fabricante_id" class="form-control" required>
                      @foreach ($fabricantes as $fab)
                      <option value="{{$fab->id}}">{{ $fab->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="airplane_model_id">Modelo de Avión</label>
                    <select id="airplane_model_id" name="airplane_model_id" class="form-control" required>
                      @foreach ($airplanemodels as $a)
                      <option value="{{$a->id}}">{{$a->nombre . " (" . $a->brand->nombre . ")" }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="partnumber">N° de Parte</label>
                    <input type="text" id="partnumber" class="form-control" value="{{ old('partnumber') }}" name="partnumber" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fechacompra">Fecha de Compra</label>
                    <input type="date" id="fechacompra" class="form-control" value="{{ old('fechacompra') }}" name="fechacompra" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="serie">N° de Serie</label>
                    <input type="text" id="serie" class="form-control" value="{{ old('serie') }}" name="serie" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tbofecha">TBO Fecha</label>
                    <input type="date" id="tbofecha" class="form-control" value="{{ old('tbofecha') }}" name="tbofecha" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tbohora">TBO Horas</label>
                    <input type="number" id="tbohora" min="0" step="1" class="form-control" value="{{ old('tbohora') }}" name="tbohora" required>
                  </div>
                </div>
                @if(isset($airplaneurl)) <!-- El que viene por URL desde la vista airplane.show -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="airplane" id="status" class="form-control" value="En Uso" readonly>

                    <select hidden name="tipo" class="form-control" required>
                      <option value="2"></option> <!-- En Uso -->
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="airplane">Avión</label>
                    <input type="airplane" id="horasdeuso" class="form-control" value="{{ $airplaneurl->patente . ' (' . $airplaneurl->model->nombre . ' ' . $airplaneurl->model->brand->nombre . ')' }}" readonly>

                    <select hidden name="airplane_id" class="form-control">
                      <option value="{{ $airplaneurl->id }}" selected></option> <!-- Airplaneurl->id -->
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="horasdeuso">Horas de uso de la pieza</label>
                    <input type="number" id="horasdeuso" class="form-control" min="0" step="1" value="{{ old('horasdeuso') }}" name="horasdeuso" required>
                  </div>
                </div>
                <div class="col-md-4">
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
                @endif
                @if(!isset($airplaneurl)) <!-- Listado completo -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tipo">Status</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                      <option value="1" selected>En Bodega</option>
                      <option value="2">En Uso</option>
                    </select>
                  </div>
                </div>
              </div>  
              <div id="airplanediv" style="display: none;" class="row">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="horasdeuso">Horas de uso de la pieza</label>
                    <input type="number" id="horasdeuso" min="0" step="1" class="form-control" value="{{ old('horasdeuso') }}" name="horasdeuso">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fechadeinstalacion">fecha de Instalación</label>
                    <input type="date" id="fechadeinstalacion" class="form-control" value="{{ old('fechadeinstalacion') }}" name="fechadeinstalacion">
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
                      <input type="number" id="notidifusotbo" class="form-control" min="1" step="1" name="notidifusotbo">
                    </div>
                  </div>
              </div>
              @endif
            </div> 
            <div class="form-actions">
              <a href="#">
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


@section('custom_js')
<script type="text/javascript">

  $( "#tipo" ) .change(function () {    
 if ($(this).val() == 1) { 
  $('#airplanediv').hide('slow'); //En Bodega
  $('#airplanediv input').removeAttr( "required" );
 }else{
  $('#airplanediv').show('slow'); //En el Avión
  $('#airplanediv input').attr( "required", 'required');
 }
});  


</script>
@endsection