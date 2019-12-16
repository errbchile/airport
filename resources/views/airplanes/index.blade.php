@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Listado de Aviones</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>Matrícula</th>
                  <th>Modelo</th>
                  <th>Permiso</th>
                  <th>Status</th>
                  <th>Horas Actuales</th>
                  <th>Horas de Vuelo</th>
                  <th>Vencimiento</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($airplanes as $b)
                <tr align="center">
                  <td>{{ $b->patente }}</td>
                  <td>{{ $b->model->nombre }}</td>
                  <td>{{ $b->permiso }}</td>
                  <td>{{ getAirplaneStatus($b->status) }}</td>
                  <td>{{ $b->horasactuales }}</td>
                  <td>{{ $b->horasdevuelo }}</td>
                  <td>{{ dateformat($b->vencimiento) }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{route('airplanes.show', ['id' => $b->id])}}">
                          <button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button>
                        </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                    <th>Matrícula</th>
                    <th>Modelo</th>
                    <th>Permiso</th>
                    <th>Status</th>
                    <th>Horas Actuales</th>
                    <th>Horas de Vuelo</th>
                    <th>Vencimiento</th>
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