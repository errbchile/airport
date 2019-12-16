@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Habilitaciones de aviones para Pilotos</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>Piloto</th>
                  <th>Aviones habilitados</th>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pilotoairplanemodels as $b)
                <tr align="center">
                    <td>{{$b->piloto->id}}</td>
                    <td>{{$b->airplane->patente}}</td>
                    <td>{{$b->airplane->nombre}}</td>
                    <td>{{$b->airplane->model->nombre}}</td>
                    <td>{{$b->airplane->brand->nombre}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{route('airplanes.show', ['id' => $b->id])}}"><button type="button" class="btn btn-info"><i class="fa fa-times"></i> Ver</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                    <th>Piloto</th>
                    <th>Aviones habilitados</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th></th>
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