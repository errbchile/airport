@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Marcas de una Aeronave</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fabricantes as $fab)
                <tr align="center">
                  <td>{{ $fab->id }}</td>
                  <td>{{ $fab->nombre }}</td>
                  <td>
                    @if($fab->eliminable == 1) <!-- Eliminable -->
                    <button type="button" class="btn-sm btn-raised btn-danger accion" borrando="{{$fab->id}}" tipo='borrar'><i class="fa fa-close"></i> Borrar</button>
                    @endif
                    
                    <!-- Deshabilitar -->
                    @if($fab->status == 1)
                        <button type="button" class="btn-sm btn-raised btn-warning deshabilitar" deshabilitando="{{$fab->id}}"><i class="fa fa-edit"></i> Deshabilitar</button>
                    @elseif($fab->status == 0)
                      <a href="{{ route('piezafabricantes.deshabilitar', ['id' => $fab->id]) }}">
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
                  <th>Nombre</th>
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
      <div align="center" class="content-header">Crear nuevo Fabricante</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('inventario.piezafabricantes.store') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-raised btn-raised btn-primary">
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
    text: "Que desea borrar este fabricante",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/piezafabricantes/borrar')}}/"+$(this).attr('borrando');
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
    text: "Que desea deshabilitar este fabricante",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/piezafabricantes/deshabilitar')}}/"+$(this).attr('deshabilitando');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection