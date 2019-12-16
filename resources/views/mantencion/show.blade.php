@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div align="center" class="content-header">Detalles de la Mantención N° {{ $mantencion->id }}</div>
    </div>
</div>

<!-- Detalles de la Mantención -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-content">
        <div class="px-3 pt-3">
          <form class="form">
            {{ csrf_field() }}
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="vuelo_tipo_id">Avión</label>
                    <input type="text" class="form-control" value="{{$mantencion->airplane->patente . ' (' . $mantencion->airplane->model->nombre . ' ' . $mantencion->airplane->model->brand->nombre . ')' . ', Status ' . getAirplaneStatus($mantencion->airplane->status) }}" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="airplane_id">Tipo de Mantención</label>
                    <input type="text" class="form-control" value="{{$mantencion->tipo->nombre}}" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="start_fecha">Tacómetro del Avión</label>
                    <div class="position-relative">
                      <input type="text" class="form-control" value="{{$mantencion->tacometro}}" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr align="center">
                    <th>N°</th>
                    <th>Tarea</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($tareas))
                    @foreach ($tareas as $ti)
                    <tr align="center">
                      <td>{{$loop->iteration}}</td>
                      @if(isset($ti))
                        <td>{{$ti->descripcion}}</td>
                      @endif
                      <td>No Realizada</td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr align="center">
                    <th>N°</th>
                    <th>Tarea</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>  
            <a href="{{ route('mantencion') }}">
                <button type="button" class="btn btn-light">
                    <i class="fas fa-chevron-circle-left"></i> Regresar
                </button>
            </a>
            @if (Auth::user()->rol ==  3) <!-- Mecánico -->
              @if($mantencion->status == 0) <!-- Solicitud -->
                <button type="button" class="btn-sm btn-raised btn-success accion" mantencion="{{$mantencion->id}}"><i class="fa fa-check"></i>Iniciar</button>
              @elseif($mantencion->status == 1) <!-- En Proceso -->
              <a href="{{ route('mantencion.finalizarcreate', ['id' => $mantencion->id]) }}">
                  <button type="button" class="btn-sm btn-raised btn-success"><i class="fa fa-check"></i> Finalizar</button>
                </a> 
              @endif
            @endif 
          </form>
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
    text: "Que desea iniciar la Mantención",
    icon: "info",
    buttons: true,
    dangerMode: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/mantenciones/iniciar')}}/"+$(this).attr('mantencion');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection