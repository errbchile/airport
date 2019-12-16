@extends('layouts.app')

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modelos de aviones</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr align="center">
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($airplanemodels as $b)
                <tr align="center">
                  <td>{{$b->nombre}}</td>
                  <td>{{$b->brand->nombre}}</td>
                  <td>
                    <div class="form-actions">
                        <a href="{{route('airplanemodels.edit', ['id' => $b->id])}}">
                          <button type="button" class="btn btn-info"><i class="fa fa-eye"></i> Editar </button>
                        </a>

                        @if ($b->airplanes == null)
                        <a href="{{route('airplanemodels.delete', ['id' => $b->id])}}">
                          <button type="button" class="btn btn-danger accion" tipo='eliminar'><i class="fa fa-close"></i> Borrar </button>
                        </a>
                        @endif
                    </div>
                    
                  </td>
                </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr align="center">
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Acción</th>
                </tr>
              </tfoot>
            </table>
            <div class="form-actions">
              <a href="{{ route('airplanemodels.create') }}">
                <button type="button" class="btn btn-outline-info">
                  <i class="fa fa-pencil"></i> Nuevo Modelo
                </button>
              </a>
              <a href="{{ route('airplanebrands.create') }}">
                <button type="button" class="btn btn-outline-info">
                  <i class="fa fa-pencil"></i> Nueva Marca
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

@section('custom_js')
<script type="text/javascript">
$( ".accion" ).click(function() {
  if ($(this).attr('tipo')=='eliminar') {
    var dangerMode = true;
    var url = "{{route('airplanemodels.delete', ['id' => $b->id])}}";
  }
  swal({
    title: "¿Está seguro?",
    text: "Que desea "+$(this).attr('tipo')+" el modelo de avión.",
    icon: "info",
    buttons: true,
    dangerMode: dangerMode,
  })
  .then((willDelete) => {
    if (willDelete) {
      location.href = url;
    } else {
      swal("No ocurrió ningún cambio.");
    }
  });
});
</script>
@endsection