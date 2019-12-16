@extends('layouts.app')

@section('content')
<section id="configuration">
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
                  <th>Matrícula</th>
                  <th colspan="2">Tacómetro</th>
                  <th>Diferencia</th>
                  <!-- <th>Descripción</th> -->
                  <!-- <th>Acciones</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach ($tacometros as $ta)
                <tr align="center">
                  <td>
                    <a href="{{ route('airplanes.show', ['id' => $ta->airplane->id]) }}">
                      {{ $ta->airplane->patente . ' (' .  $ta->airplane->model->nombre . ' '  . $ta->airplane->model->brand->nombre . ')'}}
                    </a>
                  </td>
                  <td>{{ $ta->inicial }}</td>
                  <td>{{ $ta->final }}</td>
                  <td>{{ $ta->final - $ta->inicial }}</td>
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
                  <th>Matrícula</th>
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
</section>
@endsection