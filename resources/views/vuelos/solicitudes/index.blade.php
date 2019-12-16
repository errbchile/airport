@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Solicitudes de Vuelo</h4>
          <p class="card-text">En esta tabla encontrará todas las <strong>solicitudes</strong> de vuelo realizadas y pendientes de aprobación.</p>
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
                  <th>Tipo</th>
                  @if (Auth::user()->rol ==  2)
                  <th>Piloto</th>
                  <th>Acciones</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelos as $v)
                <tr>
                  <td>{{$v->id}}</td>
                  <td>{{$v->airplane->patente }}</td>
                  <td>{{datetimeformat($v->solicitud->start)}}</td>
                  <td>{{datetimeformat($v->solicitud->end)}}</td>
                  <td>{{$v->tipo->nombre}}</td>
                  @if (Auth::user()->rol ==  2)
                  <td>{{fullname($v->piloto->user_id)}}</td>
                  <td>
                    <div class="form-actions">
                      <a href="{{route('vuelos.show', ['id' => $v->id])}}"><button type="button" class="btn btn-raised btn-info"><i class="fa fa-eye"></i> Ver</button>
                      </a>
                        @if ($v->status ==  1)
                          <button type="button" class="btn btn-raised btn-success accion" vuelo="{{$v->id}}" tipo='aprobar'><i class="fa fa-check"></i> Aprobar</button>
                        @endif
                        @if ($v->status != 0)
                        <a href="{{ route('vuelos.rechazos.create', ['vuelo_id' => $v->id]) }}">
                          <button type="button" class="btn btn-raised btn-danger" vuelo="{{$v->id}}" tipo='rechazar'><i class="fa fa-close"></i> Rechazar/Anular</button>
                        </a>
                        @endif
                        
                    </div>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Salida</th>
                  <th>Llegada</th>
                  <th>Tipo</th>
                  @if (Auth::user()->rol ==  2)
                  <th>Piloto</th>
                  <th>Acciones</th>
                  @endif
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

@section('custom_js')
<script type="text/javascript">
$(".accion").click(function() {
  if ($(this).attr('tipo')=='aprobar') {
    var dangerMode = false;
  }
  if ($(this).attr('tipo')=='rechazar') {
    var dangerMode = true;
  }
  swal({
    title: "¿Está seguro?",
    text: "Que desea "+$(this).attr('tipo')+" la reserva del vuelo.",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/vuelos/solicitud')}}/"+$(this).attr('tipo')+"/"+$(this).attr('vuelo');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection