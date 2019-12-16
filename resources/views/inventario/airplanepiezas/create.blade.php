@extends('layouts.app')

@section('content')
  <section id="flight_requests_create">

    <div class="row">
      <div class="col-sm-12">
        <div class="content-header">Instalar Pieza en la Aeronave</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-content">
            <div class="px-3 pt-3">
              <form id="myform" class="form" method="POST" action="{{ route('inventario.airplanepiezas.store') }}" autocomplete="form">
                {{ csrf_field() }}
                <div class="form-body">

                  <h4 class="form-section"><i class="fas fa-cog"></i> Ingrese Los Datos De La Nueva Pieza Para La Aeronave </h4>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre">Avión Matrícula</label>
                        <select id="id" name="nombre" class="form-control" required>
                           @foreach ($airplanes as $ar)
                          <option value="{{$ar->id}}">{{ $ar->patente . " (" . $ar->model->nombre . " " . $ar->model->brand->nombre . ")" }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre">Pieza</label>
                        <select id="id" name="nombre" class="form-control" required>
                           @foreach ($piezas as $pi)
                          <option value="{{$pi->id}}">{{ $pi->piezatipo->nombre . ", N° de Parte: " . $pi->partnumber }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="horasdeuso">Horas de uso actuales de la pieza</label>
                        <input type="number" name="horasdeuso" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="fechadeinstalacion">Fecha de Instalación en el avión</label>
                        <input type="date" name="fechadeinstalacion" required>
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-actions">
                    <a href="#">
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