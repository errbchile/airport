@extends('layouts.app')

@section('content')

<!-- Piezas EN USO -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <p align="center" class="card-text">A continuación las piezas <strong>En Uso</strong> y el avión donde están instaladas</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fabricante</th>
                  <th style="display:none">N° de Parte</th>
                  <th style="display:none">Fecha de Compra</th>
                  <th style="display:none">N° de Serie</th>
                  <th>TBO <br>Fecha</th>
                  <th>Fecha de Instalación</th>
                  <th>TBO <br>Horas</th>
                  <th>Horas de Uso</th>
                  <th>Avión</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($piezasenuso as $pi)
                <tr align="center">
                  <td>{{ $pi->id }}</td>
                  <td>{{ $pi->piezatipo->nombre }}</td>
                  <td>{{ $pi->fabricante->nombre }}</td>
                  <td style="display:none">{{ $pi->partnumber }}</td>
                  <td style="display:none">{{ $pi->fechacompra }}</td>
                  <td style="display:none">{{ $pi->serie }}</td>
                  <td>{{ dateformat($pi->tbofecha) }}</td>
                  @if(isset($pi->airplanepieza->fechadeinstalacion))
                    <td>{{ dateformat($pi->airplanepieza->fechadeinstalacion) }}</td>
                  @endif
                  <td>{{ $pi->tbohora }}</td>
                  @if(isset($pi->airplanepieza->horasdeuso))
                    <td>{{ $pi->airplanepieza->horasdeuso }}</td>
                  @endif
                  <td>
                    @if(isset($pi->airplanepieza->airplane->id))
                      <a href="{{ route('airplanes.show', ['id' => $pi->airplanepieza->airplane->id]) }}">
                      {{ $pi->airplanepieza->airplane->patente . " (" . $pi->airplanepieza->airplane->model->nombre . " " . $pi->airplanepieza->airplane->model->brand->nombre . ")" }}
                      </a>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="{{route('inventario.piezas.show', ['id' => $pi->id])}}">
                        <button type="button" class="btn btn-raised btn-info"><i class="fa fa-eye"></i>
                        </button>
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
                  <th style="display:none">N° de Parte</th>
                  <th style="display:none">Fecha de Compra</th>
                  <th style="display:none">N° de Serie</th>
                  <th>TBO <br>Fecha</th>
                  <th>Fecha de Instalación</th>
                  <th>TBO <br>Horas</th>
                  <th>Horas de Uso</th>
                  <th>Avión</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Piezas EN BODEGA -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <p align="center" class="card-text">En esta tabla encontrará las piezas <strong>En Bodega</strong> esperando ser usadas</p>
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
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($piezasenbodega as $pi)
                <tr align="center">
                  <td>{{ $pi->id }}</td>
                  <td>{{ $pi->piezatipo->nombre }}</td>
                  <td>{{ $pi->fabricante->nombre }}</td>
                  <td>{{ $pi->model->nombre }}</td>
                  <td style="display:none">{{ $pi->partnumber }}</td>
                  <td style="display:none">{{ $pi->fechacompra }}</td>
                  <td style="display:none">{{ $pi->serie }}</td>
                  <td>{{ dateformat($pi->tbofecha) }}</td>
                  <td>{{ $pi->tbohora }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="{{route('inventario.piezas.show', ['id' => $pi->id])}}">
                        <button type="button" class="btn btn-raised btn-info"><i class="fa fa-eye"></i>
                        </button>
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
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection