@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Marcas de aviones</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>Marca</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($airplanebrands as $b)
                <tr align="center">
                  <td>{{$b->nombre}}</td>
                  <td>
                    <div class="form-actions" role="group" aria-label="Basic example">
                      <a href="{{route('airplanebrands.edit', ['id' => $b->id])}}">
                          <button type="button" class="btn btn-info">Editar
                          </button>
                      </a>

                      @if ($b->model == null)
                      <a href="{{route('airplanebrands.delete', ['id' => $b->id])}}">
                        <button type="button" class="btn btn-danger">
                          <i class="fa fa-close"></i> Borrar
                        </button>
                      </a>
                      @endif

                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
            <div class="form-actions" role="group" aria-label="Basic example">
              <a href="{{route('airplanemodels')}}">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fa fa-eye"></i> Ver  Modelos
                  </button>
              </a>
              <a href="{{route('airplanebrands.create')}}">
                <button type="button" class="btn btn-outline-info">
                  <i class="fa fa-pencil"></i> Nueva Marca
                </button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection