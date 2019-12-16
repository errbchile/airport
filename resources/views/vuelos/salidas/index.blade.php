@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Aeronaves Esperando su Despegue</h4>
          <p class="card-text">En esta tabla encontrará todas las solicitudes de vuelo aprobadas y todas aquellas aeronaves reservadas esperando su despegue.</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Tipo</th>
                  <th>Salida</th>
                  <th>Llegada</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelos->reverse() as $v)
                <tr>
                  <td>{{$v->id}}</td>
                  <td>{{$v->airplane->patente . " (" . $v->airplane->model->nombre . ")"}}</td>
                  <td>{{$v->tipo->nombre}}</td>
                  <td>{{datetimeformat($v->solicitud->start)}}</td>
                  <td>{{datetimeformat($v->solicitud->end)}}</td>
                  <td>
                      @if($v->status != 5) <!-- Si no es de tipo RAID -->
                        <button type="button" class="btn-sm btn-raised btn-success accion" vuelo="{{$v->id}}"><i class="fa fa-check"></i> Iniciar Vuelo</button>

                        <a href="{{ route('vuelos.rechazos.create', ['vuelo_id' => $v->id]) }}">
                          <button type="button" class="btn-sm btn-raised btn-danger" vuelo="{{$v->id}}"><i class="fa fa-close"></i> Anular Vuelo</button>
                        </a>    
                      @elseif($v->status == 5)
                      <a href="{{ route('vuelos.bitacoras.createsalida', ['vuelo_id' => $v->id]) }}">
                        <button type="button" class="btn-sm btn-raised btn-success"><i class="fa fa-check"></i> Despegar Nuevamente</button>
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
                  <th>Tipo</th>
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

@section('custom_js')
<script type="text/javascript">
$( ".accion" ).click(function() {
  swal({
    title: "¿Está seguro?",
    text: "Que desea iniciar el vuelo",
    icon: "info",
    buttons: true,
    dangerMode: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/vuelos/salidas')}}/"+$(this).attr('vuelo');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection