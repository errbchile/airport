@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Listado de Mantenciones</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Tipo</th>
                  <th>Fecha de Solicitud</th>
                  <th>Fecha de Cierre</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mantencions as $man)
                <tr align="center">
                  <td>{{ $man->id }}</td>
                  <td>{{ $man->airplane->patente . " (" . $man->airplane->model->nombre . " " . $man->airplane->model->brand->nombre . ")" }}</td>
                  <td>{{ $man->tipo->nombre }}</td>
                  <td>{{ dateformat($man->fechasolicitud) }}</td>
                  <td>{{ dateformat($man->fechacierre) }}</td>
                  <td>{{ getMantencionStatus($man->status) }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <a href="{{ route('mantencion.show', ['id' => $man->id]) }}">
                        <button type="button" class="btn-sm btn-raised btn-info"><i class="fa fa-eye"></i></button>
                      </a>
                      @if (Auth::user()->rol ==  3) <!-- Mecánico -->
                        @if($man->status == 0) <!-- Solicitud -->
                          <button type="button" class="btn-sm btn-raised btn-success accion" mantencion="{{$man->id}}">Iniciar</button>
                        @elseif($man->status == 1) <!-- En Proceso -->
                        <a href="{{ route('mantencion.finalizarcreate', ['id' => $man->id]) }}">
                            <button type="button" class="btn-sm btn-raised btn-success">Finalizar</button>
                          </a> 
                        @endif
                      @endif  
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                  <th>ID</th>
                  <th>Avión</th>
                  <th>Tipo</th>
                  <th>Fecha de Solicitud</th>
                  <th>Fecha de Cierre</th>
                  <th>Status</th>
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