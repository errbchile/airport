@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vuelos Iniciados</h4>
          <p class="card-text">En esta tabla encontrará todos los vuelos iniciados y pendientes de cerrar.</p>
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
                  <th>Tacómetro</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelos as $v)
                <tr>
                  <td>{{$v->id}}</td>
                  <td>{{$v->airplane->patente}}</td>
                  <td>{{$v->tipo->nombre}}</td>
                  <td>{{ datetimeformat($v->salida->fecha) }}</td>
                  <td>{{$v->salida->tacometro}}</td>
                  <td>
                    <button type="button" class="btn-sm btn-raised btn-success accion" vuelo="{{$v->id}}"><i class="fa fa-check"></i> Cerrar Vuelo
                    </button>
                    @if($v->tipo->id == 6 && $v->status == 3) <!-- Vuelos tipo RAID -->
                      <a href="{{ route('vuelos.bitacoras.createllegada', ['vuelo_id' => $v->id]) }}">
                        <button type="button" class="btn-sm btn-raised btn-info" vuelo="{{$v->id}}"><i class="fa fa-check"></i> Aterrizaje parcial
                        </button>
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
    text: "Que desea cerrar el vuelo",
    icon: "info",
    buttons: true,
    dangerMode: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/vuelos/llegadas')}}/"+$(this).attr('vuelo');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection