@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
    <div class="content-header">{{fullname($piloto->user->id)}} Saldo Actual: {{ "(" . clp($piloto->saldo) . ")" }}</div>
    </div>
</div>

<!-- AGREGANDO SALDO -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <form class="form" method="POST" action="{{ route('pilotosaldos.store', ['piloto_id' => $piloto->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section"><i class="fas fa-dollar-sign"></i> Ingrese El Monto Que Desea Agregar</h4>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="monto">Monto</label>
                                      <input type="number" class="form-control" name="monto" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="start_fecha">Forma de Pago</label>
                                    <div class="position-relative">
                                      <select name="forma_pago" class="form-control" required>
                                          <option selected disabled>Seleccione</option>
                                          @foreach (listFormasPago() as $key => $value)
                                            @if ($key > 0)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                          @endforeach  
                                      </select>
                                    </div>
                                  </div>
                                </div> 
                                @if(isset($vuelo))
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="descripcion">Detalles del Vuelo a Pagar</label>
                                      <input type="text" class="form-control" name="descripcion" value="{{ 'Pago por el vuelo N°: ' . $vuelo->id . ', avión ' . $vuelo->airplane->patente . ' (' . $vuelo->airplane->model->nombre . ' ' . $vuelo->airplane->model->brand->nombre . ')' }}" readonly>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div>
                              <input type="submit" id="submit" class="btn btn-success" value="Cargar Saldo">
                              <a href="{{ route('pilotos.show', ['id' => $piloto->id]) }}">
                                  <button type="button" class="btn btn-light">
                                      <i class="fas fa-chevron-circle-left"></i> Regresar
                                  </button>
                              </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
