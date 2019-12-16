@extends('layouts.app')

@section('content')


  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Vuelos en el Aire</h4>
            <p class="card-text">En esta tabla encontrará las aeronaves que se encuentran volando</p>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Avión</th>
                    <th>Tipo</th>
                    <th>Salida Real</th>
                    <th>Llegada Planificada</th>
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
                    <td>{{$v->airplane->patente . " (" . $v->airplane->model->nombre . " " . $v->airplane->model->brand->nombre . ")" }}</td>
                    <td>{{$v->tipo->nombre}}</td>
                    <td>{{datetimeformat($v->salida->start)}}</td>
                    <td>{{datetimeformat($v->solicitud->end)}}</td>
                    @if (Auth::user()->rol ==  2)
                    <td>{{fullname($v->piloto->user_id)}}</td>
                    <td>
                      <div class="form-actions">
                        <a href="{{route('vuelos.show', ['id' => $v->id])}}">
                          <button type="button" class="btn btn-raised btn-info btn-sm"><i class="fa fa-eye"></i>
                          </button>
                        </a>
                          <!-- Excepción para finalizar vuelo si es de tipo local -->
                          @if ($v->tipo->id == 1 && $v->cobros->excepcion != 1)
                            <button type="button" class="btn btn-raised btn-danger btn-sm accion" vuelo_id="{{$v->id}}"><i class="fa fa-close"></i> Cierre Excepcional
                            </button>
                          @endif
                          @if ($v->tipo->id == 1 && $v->cobros->excepcion == 1)
                          <button type="button" class="btn btn-raised btn-warning btn-sm accion" vuelo_id="{{$v->id}}"><i class="fa fa-close"></i> Revertir Excepción
                            </button>
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
                    <th>Tipo</th>
                    <th>Salida Real</th>
                    <th>Llegada Planificada</th>
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
    var vuelo_id = $(this).attr('vuelo_id');
    var url = "{{url('/vuelos/excepcion/')}}/" + vuelo_id;
    swal({
      title: "¿Está seguro?",
      text: "Que desea ejecutar excepción de cobro al vuelo.",
      icon: "info",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        location.href = (url);
      } else {
        swal("No ocurrió ningún cambio.");
      }
    });
  });
  </script>
@endsection