@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tareas</h4>
          <p class="card-text">En esta tabla encontrará las tareas posibles para una mantención</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tareas as $ta)
                <tr align="center">
                  <td>{{$ta->id}}</td>
                  <td>{{$ta->descripcion}}</td>
                  <td>
                    @if($ta->eliminable == 1) <!-- Eliminable -->
                    <button type="button" class="btn-sm btn-raised btn-danger accion" borrando="{{$ta->id}}" tipo='borrar'><i class="fa fa-close"></i> Borrar</button>
                    @endif
                    
                    <!-- Deshabilitar -->
                    @if($ta->status == 1)
                        <button type="button" class="btn-sm btn-raised btn-warning deshabilitar" deshabilitando="{{$ta->id}}"><i class="fa fa-edit"></i> Deshabilitar</button>
                    @elseif($ta->status == 0)
                      <a href="{{ route('mantencion.tarealists.deshabilitar', ['id' => $ta->id]) }}">
                        <button type="button" class="btn-sm btn-raised btn-warning"><i class="fa fa-edit"></i> Habilitar</button>
                      </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr align="center">
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div align="center" class="content-header">Registrar Nueva Tarea</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('mantencion.tarealists.store') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="descripcion">Descripción</label>
                      <input type="text" id="descripcion" class="form-control" name="descripcion" required>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-raised btn-raised btn-success">
                    <i class="fa fa-check-square-o"></i> Registrar
                  </button>
                </div>
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
$(".accion").click(function() {
    if ($(this).attr('tipo')=='borrar') {
    var dangerMode = true;
  }
  swal({
    title: "¿Está seguro?",
    text: "Que desea borrar esta modalidad",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/tareas/borrar')}}/"+$(this).attr('borrando');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});



$(".deshabilitar").click(function() {
    if ($(this).attr('tipo')=='deshabilitar') {
    var dangerMode = true;
  }
  swal({
    title: "¿Está seguro?",
    text: "Que desea deshabilitar esta modalidad",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/tareas/deshabilitar')}}/"+$(this).attr('deshabilitando');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection