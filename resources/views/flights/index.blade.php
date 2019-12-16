@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Solicitudes de Vuelo</h4>
          <p class="card-text">En esta tabla encontrará todas las solicitudes de vuelo realizadas.</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Piloto</th>
                  <th>Salida</th>
                  <th>Llegada</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelos as $v)
                <tr>
                  <td>{{$v->id}}</td>
                  <td>{{$v->airplane->patente}}</td>
                  <td>{{$v->user->name}}</td>
                  <td>{{datetimeformat($v->start)}}</td>
                  <td>{{datetimeformat($v->end)}}</td>
                  <td></td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Piloto</th>
                  <th>Salida</th>
                  <th>Llegada</th>
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