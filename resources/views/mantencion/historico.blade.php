@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Histórico de Mantenciones</h4>
          <p class="card-text">En esta tabla encontrará todas las <strong>Mantenciones Finalizadas</strong></p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Tacómetro</th>
                  <th>Tipo</th>
                  <th>Fecha de Solicitud</th>
                  <th>fecha de Cierre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mantenciones as $man)
                <tr>
                  <td>{{$man->id}}</td>
                  <td>{{$man->airplane->patente}}</td>
                  <td>{{$man->tacometro}}</td>
                  <td>{{$man->tipo->nombre}}</td>
                  <td>{{dateformat($man->fechasolicitud)}}</td>
                  <td>{{dateformat($man->fechacierre)}}</td>
                  <td align="center">
                    <a href="#">
                      <button type="button" class="btn-sm btn-raised btn-info"><i class="fa fa-eye"></i></button> 
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Tacómetro</th>
                  <th>Tipo</th>
                  <th>Fecha de Solicitud</th>
                  <th>fecha de Cierre</th>
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