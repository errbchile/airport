@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tipos de Mantenciones</h4>
          <p class="card-text">En esta tabla encontrará los distintos tipos de mantenciones que existen</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tipos as $ti)
                <tr align="center">
                  <td>{{$ti->id}}</td>
                  <td>{{$ti->nombre}}</td>
                  <td>
                    <a href="{{ route('mantencion.tipos.edit', ['id' => $ti->id]) }}">
                      <button type="button" class="btn btn-raised btn-raised btn-primary">
                        <i class="fa fa-check-square-o"></i> Editar
                      </button>
                    </a>
                    <a href="{{ route('mantencion.tipos.show', ['id' => $ti->id]) }}">
                      <button type="button" class="btn btn-raised btn-raised btn-primary">
                        <i class="fa fa-check-square-o"></i> Ver
                      </button>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
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