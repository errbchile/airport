@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Histórico de Vuelos</h4>
          <p class="card-text">En esta tabla encontrará todos los <strong>vuelos finalizados</strong></p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Salida</th>
                  <th>Llegada</th>
                  <th>Tacómetro</th>
                  <th>Monto</th>
                  @if (Auth::user()->rol ==  2)
                  <th>Piloto</th>
                  @endif
                  <th>Ver</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelos->reverse() as $v)
                <tr>
                  <td>{{$v->id}}</td>
                  <td>{{$v->airplane->patente}}</td>
                  <td>{{datetimeformat($v->solicitud->start)}}</td>
                  <td>{{datetimeformat($v->solicitud->end)}}</td>
                  <td>{{$v->cobros->tacometro}}</td>
                  <td>{{clp($v->cobros->monto)}}</td> 
                  @if (Auth::user()->rol ==  2)
                  <td>{{fullname($v->piloto->user_id)}}</td>
                  @endif
                  <td align="center">
                    <a href="{{route('vuelos.informe', ['id' => $v->id])}}">VER PDF</a>
                    @if (Auth::user()->rol ==  2) <!-- Administrador -->
                      <a href="{{route('pilotosaldos.create', ['piloto_id' => $v->piloto->user_id, 'vuelo_id' => $v->id])}}">
                        <button type="button" class="btn-sm btn-raised btn-info"><i class="fa fa-eye"></i> Cobro de Vuelo</button> 
                      </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Salida</th>
                  <th>Llegada</th>
                  <th>Tacómetro</th>
                  <th>Monto</th>
                  @if (Auth::user()->rol ==  2)
                  <th>Piloto</th>
                  @endif
                  <th>Ver</th>
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