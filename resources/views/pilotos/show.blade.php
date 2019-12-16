@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">{{fullname($piloto->user->id)}}</div>
    </div>
</div>

<!-- PILOTO INDIVIDUAL -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">
                <div class="form-actions" >
                <h4 class="form-section"><i class="fas fa-male"></i> Detalles</h4>
                </div>
                <?php  ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="rut">Rut</label>
                      <input type="text" class="form-control" name="rut" value="{{$piloto->user->rut}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="nombre">Nombre Completo</label>
                      <input type="text" class="form-control" name="nombre" value="{{fullname($piloto->user->id)}}" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="email" class="form-control" name="email" value="{{$piloto->user->email}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="piloto_tipo">Rol</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="start_hora" class="form-control" name="piloto_tipo" value="{{$piloto->tipo->nombre}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="vuelo_horas">Horas de vuelo</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="end_fecha" class="form-control" name="vuelo_horas" value="{{$piloto->horasdevuelo}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="end_hora">La Licencia Vence</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="end_hora" class="form-control" name="end_hora" value="{{dateformat($piloto->licencia_end)}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="telefono">Teléfono</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="end_hora" class="form-control" name="telefono" value="{{$piloto->user->telefono}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="saldoActual">Saldo Actual</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="end_hora" class="form-control" name="saldoActual" value="{{clp($piloto->saldo)}}" readonly>
                        <div class="form-control-position">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="{{ route('pilotos') }}">
                    <button type="button" class="btn btn-light">
                        <i class="fas fa-chevron-circle-left"></i> Regresar
                    </button>
                </a>
                <a href="{{route('pilotos.edit', ['id' => $piloto->id])}}">
                  <button type="button" class="btn btn-raised btn-info">
                    <i class="fa fa-edit"></i> Editar
                  </button>
                </a>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>
</div>

<!-- SALDO -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <div class="form-body">
          <h4 class="form-section"><i class="fal fa-sack-dollar"></i> Saldo Actual</h4>
            
            <div class="row">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Saldo</th>
                    <th>Forma</th>
                    <th>Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($piloto->saldos->reverse() as $sa)
                    <tr>
                      <td>{{ dateformat($sa->fecha) }}</td> 
                      <td>{{ clp($sa->monto) }}</td> 
                      <td>{{ clp($sa->saldoactual) }}</td> 
                      <td>{{ getFormasPago($sa->forma_pago) }}</td>
                      <td>{{ $sa->descripcion }}</td> 
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Saldo</th>
                    <th>Forma</th>
                    <th>Descripción</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="form-actions">
              <a href="{{ route('pilotos') }}">
                  <button type="button" class="btn btn-light">
                      <i class="fas fa-chevron-circle-left"></i> Regresar
                  </button>
              </a>

              @if (Auth::user()->rol ==  2)
              <a href="{{route('pilotosaldos.create', ['piloto_id' => $piloto->id])}}">
                <button type="button" class="btn btn-raised btn-info">
                  <i class="fa fa-edit"></i> Agregar Saldo
                </button>
              </a>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bitácora de Vuelos -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <div class="form-body">
            <h4 class="form-section"><i class="ft-file-text"></i> Bitácora de Vuelos Finalizados de {{fullname($piloto->user->id)}}</h4>
            <div class="row">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                      <tr>
                          <th>Vuelo ID</th>
                          <th>Salida</th>
                          <th>Llegada</th>
                          <th>Tiempo de Vuelo</th>
                          <th>Monto</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($piloto->user->vuelos as $vu)
                        @if($vu->vuelo->status == 4)
                            <tr>
                              <td>
                                {{$vu->id}}
                              </td> 
                              <td>
                                {{ datetimeformat($vu->vuelo->salida->fecha) }}
                              </td>
                              <td>
                                {{ datetimeformat($vu->vuelo->llegada->fecha) }}
                              </td>
                              <td>
                                {{round($vu->vuelo->cobros->tiempo_vuelo/3600,2)}} hrs.
                              </td>
                              <td>
                                {{clp($vu->vuelo->cobros->monto)}}
                              </td>
                            </tr>
                        @endif
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Vuelo ID</th>
                          <th>Salida</th>
                          <th>Llegada</th>
                          <th>Tiempo de Vuelo</th>
                          <th>Monto</th>
                      </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- MODELOS HABILITADOS -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <div class="form-body">
            <h4 class="form-section"><i class="fas fa-plane"></i> Modelos Habilitados para {{fullname($piloto->user->id)}}</h4>
            
            <div class="row">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Modelos</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($piloto->airplanemodels->reverse() as $m)
                    <tr>
                      <td>{{$m->model->nombre}}</td> 
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Modelos</th>
                  </tr>
                </tfoot>
              </table>
            </div>
              <div class="form-actions">
              <a href="{{ route('pilotos') }}">
                  <button type="button" class="btn btn-light">
                      <i class="fas fa-chevron-circle-left"></i> Regresar
                  </button>
              </a>
              @if (Auth::user()->rol ==  2)
                <a href="{{route('pilotoairplanemodels.edit', ['piloto_id' => $piloto->id])}}">
                    <button type="button" class="btn btn-raised btn-info"><i class="fa fa-edit"></i> Editar modelos</button>
                </a>  
              @endif
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- PISTAS HABILITADAS -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <div class="form-body">
            <h4 class="form-section"><i class="fas fa-globe-americas"></i> Pistas Habilitadas para {{fullname($piloto->user->id)}}</h4>
            
            <div class="row">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Región</th>
                    <th>Aeropuertos</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($piloto->airports as $pa)
                    <tr>
                      <td>{{ getFullRegionName($pa->airport->region->id) }}</td> 
                      <td>{{ $pa->airport->nombre }}</td> 
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Región</th>
                    <th>Aeropuertos</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="form-actions">
            <a href="{{ route('pilotos') }}">
                  <button type="button" class="btn btn-light">
                      <i class="fas fa-chevron-circle-left"></i> Regresar
                  </button>
              </a>
              <a href="{{route('pilotoairports.edit', ['piloto_id' => $piloto->id])}}">
                <button type="button" class="btn btn-raised btn-info">
                  <i class="fa fa-edit"></i> Editar pistas
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</section>
@endsection
