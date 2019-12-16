@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Aeropuertos</h4>
          <p class="card-text">Aeropuertos registrados</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>Región</th>
                  <th>Ciudad</th>
                  <th>Nombre</th>
                  <th>OACI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($airports as $u)
                <tr>
                  <td>{{$u->region->nombre}}</td>
                  <td>{{$u->ciudad}}</td>
                  <td>{{$u->nombre}}</td>
                  <td>{{$u->oaci}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>  
                  <th>Región</th>
                  <th>Ciudad</th>
                  <th>Nombre</th>
                  <th>OACI</th>
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