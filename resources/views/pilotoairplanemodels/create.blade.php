@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Habilitación de aviones para pilotos</div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="px-3 pt-3">
                    <form class="form" method="POST" action="{{ route('pilotoairplanemodels.store') }}">
                    {{ csrf_field() }}
                        <div class="form-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="vuelo_tipo_id">Escoja el modelo de avión</label>
                                    <select id="vuelo_tipo_id" name="vuelo_tipo_id" class="form-control">
                                        @foreach ($airplanemodels as $t)
                                        <option value="{{$t->id}}">{{$t->nombre}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="airplane_id">Escoja el piloto</label>
                                    <select id="airplane_id" name="airplane_id" class="form-control">
                                        @foreach ($users as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                    <i class="fa fa-check-square-o"></i> Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection