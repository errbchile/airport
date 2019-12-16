@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tipos de Vuelo</h4>
          <p class="card-text">En esta tabla encontrará todos las Modalidades de Vuelo en el Club</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Monto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vuelotipos as $vuti)
                <tr align="center">
                  <td>{{$vuti->id}}</td>
                  <td>{{$vuti->nombre}}</td>
                  <td>{{$vuti->monto}}</td>
                  <td>
                    @if($vuti->eliminable == 1) <!-- Eliminable -->
                    <button type="button" class="btn-sm btn-raised btn-danger accion" borrando="{{$vuti->id}}" tipo='borrar'><i class="fa fa-close"></i> Borrar</button>
                    @endif
                    <a href="{{ route('vuelotipos.edit', ['vuelotipo_id' => $vuti->id]) }}">
                      <button type="button" class="btn-sm btn-raised btn-info"><i class="fa fa-edit"></i> Editar</button>
                    </a>

                    
                    <!-- Deshabilitar -->
                    @if($vuti->status == 1)
                        <button type="button" class="btn-sm btn-raised btn-warning deshabilitar" deshabilitando="{{$vuti->id}}"><i class="fa fa-edit"></i> Deshabilitar</button>
                    @elseif($vuti->status == 0)
                      <a href="{{ route('vuelotipos.deshabilitar', ['id' => $vuti->id]) }}">
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
                  <th>Monto</th>
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
      <div align="center" class="content-header">Crear Nueva Modalidad de Vuelo</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('vuelotipos.store') }}" autocomplete="form">
              {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="fa fa-file"></i> Ingrese los datos de la Nueva Modalidad </h4>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="monto">Monto</label>
                      <input type="number" id="monto" class="form-control" name="monto" value="{{ old('monto') }}" required>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <a href="{{ route('vuelotipos') }}">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
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
    text: "Que desea borrar esta modalidad",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = "{{url('/vuelos/tipos/borrar')}}/"+$(this).attr('borrando');
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
      location.href = "{{url('/vuelos/tipos/deshabilitar')}}/"+$(this).attr('deshabilitando');
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection