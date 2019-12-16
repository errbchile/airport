@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Crear un Nuevo Avión</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('airplanes.store') }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Registre aquí los datos para crear el nuevo avión del club </h4>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="patente">Matrícula</label>
                      <input type="text" id="patente" class="form-control" name="patente" value="{{ old('patente') }}" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="airplane_model_id">Modelo</label>
                      <select id="airplane_model_id" name="airplane_model_id" class="form-control" required>
                        @foreach ($models as $m)
                          <option value="{{$m->id}}">{{$m->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="airplane_brand_id">Marca</label>
                      <select id="airplane_brand_id" name="airplane_brand_id" class="form-control" required>
                        @foreach ($brands as $a)
                          <option value="{{$a->id}}">{{$a->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="permiso">Permiso</label>
                        <select id="permiso" name="permiso" class="form-control" required>
                            @for ($i = 1950; $i <= 2050; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="vencimiento">Vencimiento</label>
                      <input type="date" id="vencimiento" class="form-control" name="vencimiento" value="{{ old('vencimiento') }}" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="horasactuales">Horas Actuales</label>
                      <input type="number" id="horasactuales" class="form-control" name="horasactuales" value="{{ old('horasactuales') }}" required="" min="0" step="0.1">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="horasdevuelo">Horas de Vuelo</label>
                      <input type="number" id="horasdevuelo" class="form-control" name="horasdevuelo" value="{{ old('horasdevuelo') }}" required min="0" step="0.1">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select id="status" name="status" class="form-control" required>
                        @foreach (listAirplaneStatus() as $key => $value)
                          @if ($key != 0)
                            <option value="{{$key}}" isSelected($key, old('status'))>{{$value}}</option>
                          @endif
                        @endforeach
                      </select>
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

</section>
@endsection