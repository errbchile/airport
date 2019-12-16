@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Detalles del Avión</div>
    </div>
</div>

<!-- Detalles del avión -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
            <div class="form-body">

              <h4 class="form-section"><i class="ft-file-text"></i> Detalles del Avión {{$airplane->patente . " (" . $airplane->model->brand->nombre . " " . $airplane->model->nombre . ")" }}</h4>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="vuelo_tipo_id">Matrícula</label>
                    <input type="text" class="form-control" value="{{$airplane->patente}}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="airplane_id">Modelo</label>
                    <input type="text" class="form-control" value="{{$airplane->model->nombre}}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_fecha">Marca</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{$airplane->model->brand->nombre}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_fecha">Permiso</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{$airplane->permiso}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_fecha">Horas Actuales</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{$airplane->horasactuales}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_fecha">Horas de vuelo</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{$airplane->horasdevuelo}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="horasdevuelo">N° de Vuelos Realizados</label>
                        <input type="text" class="form-control" name="horasdevuelo" value="{{ count($airplane->vuelos) }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_fecha">Vencimiento</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{ dateformat($airplane->vencimiento) }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" value="{{ getAirplaneStatus($airplane->status) }}" readonly>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                  <a href="{{ route('airplanes') }}">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
                
                  <a href="{{route('airplanes.edit', ['id' => $airplane->id])}}">
                    <button type="button" class="btn btn-raised btn-info">
                      <i class="fa fa-edit"></i> Editar
                    </button>
                  </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Pilotos Autorizados -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pilotos Autorizados</h4>
      </div>
      <div class="card-content">
        <div class="card-body card-dashboard table-responsive">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr align="center">
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($airplane->model->pilotos as $pi)
                <tr align="center">
                  <td>{{ $pi->piloto->user->rut }}</td>
                  <td>{{ fullnameApellido($pi->piloto->user->id) }}</td>
                  <td>{{ $pi->piloto->user->telefono }}</td>
                  <td>{{ $pi->piloto->user->email }}</td>
                  <td>{{ $pi->piloto->tipo->nombre }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="{{ route('pilotos.show', ['id' => $pi->piloto->id]) }}">
                        <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr align="center">
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mantenciones de este avión -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Mantenciones</h4>
      </div>
      <div class="card-content">
        <div class="card-body card-dashboard table-responsive">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr align="center">
                <th>ID</th>
                <th>Tipo</th>
                <th>Tacómetro</th>
                <th>Fecha Solicitud</th>
                <th>fecha Cierre</th>
                <th>Status</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mantenciones as $man)
              <tr align="center">
                <td>{{ $man->id }}</td>
                <td>{{ $man->tipo->nombre }}</td>
                <td>{{ $man->tacometro }}</td>
                <td>{{ dateformat($man->fechasolicitud) }}</td>
                <td>{{ dateformat($man->fechacierre) }}</td>
                <td>{{ getMantencionStatus($man->status) }}</td>
                <td>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route('pilotos.show', ['id' => $pi->piloto->id]) }}">
                      <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr align="center">
                <th>ID</th>
                <th>Tipo</th>
                <th>Tacómetro</th>
                <th>Fecha Solicitud</th>
                <th>fecha Cierre</th>
                <th>Status</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Piezas Instaladas -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Piezas Instaladas en el Avión {{$airplane->patente . " (" . $airplane->model->brand->nombre . " " . $airplane->model->nombre . ")" }}</h4>
      </div>
      <div class="card-content">
        <div class="card-body card-dashboard table-responsive">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr align="center">
                <th>Nombre</th>
                <th>N° de Parte</th>
                <th>Horas de Uso</th>
                <th>TBO Horas</th>
                <th>Fecha <br>de <br>Instalación</th>
                <th>TBO fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($airplanepiezas as $arpi)
              <tr align="center">
                <td>{{ $arpi->pieza->piezatipo->nombre }}</td>
                <td>{{ $arpi->pieza->partnumber }}</td>
                <td>{{ $arpi->horasdeuso }}</td>
                <td>{{ $arpi->pieza->tbohora }}</td>
                <td>{{ dateformat($arpi->fechadeinstalacion) }}</td>
                <td>{{ dateformat($arpi->pieza->tbofecha) }}</td>
                <td>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route('inventario.piezas.show', ['id' => $arpi->pieza->id]) }}">
                      <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr align="center">
                <th>Nombre</th>
                <th>N° de Parte</th>
                <th>Horas de Uso</th>
                <th>TBO Horas</th>
                <th>Fecha <br>de <br>Instalación</th>
                <th>TBO fecha</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
          <a href="{{ route('inventario.piezas.create', ['airplane_id' => $airplane->id]) }}">
            <button type="button" class="btn btn-raised btn-info">
              <i class="fa fa-edit"></i> Agregar
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Diferencias en el Tacómetro -->
@if($tacometros != null)
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Diferencias del Tacómetro No Procesadas</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th colspan="2">Tacómetro</th>
                  <th>Diferencia</th>
                  <!-- <th>Descripción</th> -->
                  <!-- <th>Acciones</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach ($tacometros as $ta)
                <tr align="center">
                  <td>{{ $ta->inicial . " Hrs" }}</td>
                  <td>{{ $ta->final . " Hrs" }}</td>
                  <td>{{ $ta->final - $ta->inicial . " Hrs" }}</td>
                  <!-- <td>{{ $ta->descripcion }}</td> -->
                  <!-- <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="#">
                        <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                      </a>
                    </div>
                  </td> -->
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                  <th colspan="2">Tacómetro</th>
                  <th>Diferencia</th>
                  <!-- <th>Descripción</th> -->
                  <!-- <th>Acciones</th> -->
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif


</section>
@endsection