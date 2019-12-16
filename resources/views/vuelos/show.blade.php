@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Vuelo</div>
    </div>
</div>

<!-- LLEGADA PREDETERMINADA-->
@if ($vuelo->llegada != null)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <form class="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-body">
                        <h4 class="form-section"><i class="fas fa-plane-arrival"></i> Llegada del Vuelo # {{ $vuelo->id . "," }}  Monto: {{ clp($vuelo->cobros->monto) }}</h4>

                        <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="pais_llegada">País</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="pais_llegada" value="Chile" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region_llegada">Region</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="region_llegada" value="{{$vuelo->llegada->airport->region->nombre}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aeropuerto_llegada">Aeropuerto</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="aeropuerto_llegada" value="{{$vuelo->llegada->airport->nombre}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_fecha_salida">Fecha de Llegada real</label>
                                <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" name="start_fecha_salida" value="{{dateformat($vuelo->llegada->fecha)}}" readonly>
                                    <div class="form-control-position">
                                        <i class="ft-message-square"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hora_llegada">Hora de Llegada real</label>
                                <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" name="hora_llegada" value="{{timeFormat($vuelo->llegada->fecha)}}" readonly>
                                    <div class="form-control-position">
                                        <i class="ft-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_hora">Tacómetro de Llegada</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" class="form-control" name="tacometro" value="{{$vuelo->llegada->tacometro}}" readonly>
                                    <div class="form-control-position">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_hora">Pasajeros</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" class="form-control" name="tacometro" value="{{$vuelo->cobros->pasajeros}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comentarios">Comentario</label>
                                <textarea id="comentarios" rows="3" class="form-control" name="comentarios" readonly>{{$vuelo->llegada->comentarios}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- ESCALAS -->
@if($vuelo->bitacoras != null)
    @foreach($vuelo->bitacoras->reverse() as $bi)
        <!-- DESPEGUE PARCIAL -->
        @if($bi->tipo == 2)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="px-3 pt-3">
                                <form class="form" method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                    
                                    <h4 class="form-section"><i class="fas fa-plane-departure"></i> Despegue Parcial N° {{ $loop->remaining + 1 }}</h4>
                    
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="pais">Pais</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="pais" value="Chile" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="regiones_salida">Regiones</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="regiones_salida" value="{{$bi->airport->region->nombre}}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_fecha">Aeropuerto</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="tacometro" value="{{$bi->airport->nombre}}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="start_fecha_salida">Fecha de Salida real</label>
                                                    <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="start_fecha_salida" value="{{dateformat($bi->fecha)}}" readonly>
                                                        <div class="form-control-position">
                                                            <i class="ft-message-square"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="start_hora_salida">Hora de Salida real</label>
                                                    <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="start_hora_salida" value="{{timeFormat($bi->fecha)}}" readonly>
                                                        <div class="form-control-position">
                                                            <i class="ft-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tacometro">Tacómetro de Salida</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="tacometro" value="{{$bi->tacometro}}" readonly>
                                                        <div class="form-control-position">
                                                            <i class="fas fa-tachometer-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- ATERRIZAJE PARCIAL -->
        @if($bi->tipo == 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="px-3 pt-3">
                                <form class="form" method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-plane-arrival"></i> Aterrizaje Parcial N° {{ $loop->remaining + 1 }}</h4>

                                    <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pais_llegada">País</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="pais_llegada" value="Chile" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="region_llegada">Region</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="region_llegada" value="{{ $bi->airport->region->nombre }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="aeropuerto_llegada">Aeropuerto</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="aeropuerto_llegada" value="{{$bi->airport->nombre}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start_fecha_salida">Fecha de Llegada real</label>
                                            <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="start_fecha_salida" value="{{dateformat($bi->fecha)}}" readonly>
                                                <div class="form-control-position">
                                                    <i class="ft-message-square"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hora_llegada">Hora de Llegada real</label>
                                            <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="hora_llegada" value="{{timeFormat($bi->fecha)}}" readonly>
                                                <div class="form-control-position">
                                                    <i class="ft-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start_hora">Tacómetro de Llegada</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" class="form-control" name="tacometro" value="{{$bi->tacometro}}" readonly>
                                                <div class="form-control-position">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif

<!-- SALIDA PREDETERMINADA-->
@if ($vuelo->salida != null)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <form class="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-body">
        
                        <h4 class="form-section"><i class="fas fa-plane-departure"></i> Salida del Vuelo</h4>
        
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pais">Pais</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="pais" value="Chile" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="regiones_salida">Regiones</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="regiones_salida" value="{{$vuelo->salida->airport->region->nombre}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_fecha">Aeropuerto</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="tacometro" value="{{$vuelo->salida->airport->nombre}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="start_fecha_salida">Fecha de Salida real</label>
                                        <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="start_fecha_salida" value="{{dateformat($vuelo->salida->fecha)}}" readonly>
                                            <div class="form-control-position">
                                                <i class="ft-message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="start_hora_salida">Hora de Salida real</label>
                                        <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="start_hora_salida" value="{{timeFormat($vuelo->salida->fecha)}}" readonly>
                                            <div class="form-control-position">
                                                <i class="ft-clock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tacometro">Tacómetro de Salida</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="tacometro" value="{{$vuelo->salida->tacometro}}" readonly>
                                            <div class="form-control-position">
                                                <i class="fas fa-tachometer-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pasajeros_salida">Pasajeros</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="pasajeros_salida" value="{{$vuelo->cobros->pasajeros}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- SOLICITUD -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="">
            {{ csrf_field() }}
                <div class="form-body">
                <h4 class="form-section"><i class="ft-file-text"></i> Solicitud realizada el día {{ datetimeformat($vuelo->solicitud->created_at) }}</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vuelo_tipo_id">Tipo de Vuelo</label>
                                <input type="text" class="form-control" name="vuelo_tipo_id" min="0" step="0.1" value="{{$vuelo->tipo->nombre}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="airplane_patente">Matrícula de Avión</label>
                              <input type="text" class="form-control" name="airplane_patente" value="{{$vuelo->airplane->patente}} Modelo {{$vuelo->airplane->model->nombre}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="fecha_solicitud_vuelo">Fecha de solicitud</label>
                              <input type="text" class="form-control" name="fecha_solicitud_vuelo" value="{{ dateformat($vuelo->solicitud->created_at)}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_fecha">Fecha de Salida</label>
                                <div class="position-relative has-icon-left">
                                <input type="text" id="start_fecha" class="form-control" name="start_fecha" value="{{dateformat($vuelo->solicitud->start)}}" readonly>
                                <div class="form-control-position">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="start_hora">Hora de Salida</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="start_hora" class="form-control" name="start_hora" value="{{timeFormat($vuelo->solicitud->start)}}" readonly>
                            <div class="form-control-position">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="end_fecha">Fecha de Llegada</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="end_fecha" class="form-control" name="end_fecha" value="{{dateformat($vuelo->solicitud->end)}}" readonly>
                            <div class="form-control-position">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="end_hora">Hora de Llegada</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="end_hora" class="form-control" name="end_hora" value="{{timeFormat($vuelo->solicitud->end)}}" readonly>
                            <div class="form-control-position">
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
            </form>
            <div class="form-actions">
                <a href="{{ route('vuelos_solicitudes') }}">
                    <button type="button" class="btn btn-light">
                        <i class="fas fa-chevron-circle-left"></i> Regresar
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