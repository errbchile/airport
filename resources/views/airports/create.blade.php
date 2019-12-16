@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

  <div class="row">
    <div class="col-sm-12">
      <div class="content-header">Nuevo Aeropuerto</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('airports.store') }}">
            {{ csrf_field() }}
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Registre el nuevo aeropuerto </h4>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" name="nombre">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" id="ciudad" class="form-control" name="ciudad">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="oaci">OACI</label>
                      <input type="text" id="oaci" class="form-control" name="oaci">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="region_id">Region</label>
                        <select name="region_id" id="region_id" class="form-control">
                          @foreach ($regiones as $r)
                          <option value="{{$r->region_id}}">{{$r->nombre}}</option>    
                          @endforeach
                        </select>
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

</section>
@endsection


@section('custom_js')
<script type="text/javascript">
$('#password').change(function() {
  var value = $(this).val();
  $('#password_again').val(value);
});
</script>
@endsection
