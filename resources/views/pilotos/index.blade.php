@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pilotos</h4>
          <p class="card-text">En esta tabla encontrará todos las pilotos registrados en el sistema.</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>RUT</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Saldo</th>
                  <th>Teléfono</th>
                  <td style="display:none">Email</td>
                  <th>Lic vence</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $u)
                <tr align="center">
                  <td>{{ $u->rut }}</td>
                  <td>{{ fullnameApellido($u->id) }}</td>
                  <td>{{ $u->piloto->tipo->nombre }}</td>
                  <td>
                    @foreach ($u->piloto->saldos as $saldo)
                      @if($loop->first)
                        {{ clp($saldo->saldoactual) }}
                      @endif  
                    @endforeach
                  </td>
                  <td>{{ $u->telefono }}</td>
                  <td style="display:none">{{ $u->email }}</td>
                  <td>{{ dateformat($u->piloto->licencia_end) }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{route('pilotos.show', ['id' => $u->piloto->id])}}"><button type="button" class="btn btn-raised btn-info"><i class="fa fa-eye"></i></button></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr align="center">
                  <th>RUT</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Saldo</th>
                  <th>Teléfono</th>
                  <td style="display:none">Email</td>
                  <th>Lic vence</th>
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