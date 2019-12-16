@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Detalles</div>
    </div>
</div>

<!-- PISTAS HABILITADAS POR PILOTO -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('pilotoairports.update', ['piloto_id'=>$piloto->id]) }}">
                        {{ csrf_field() }}
              <div class="form-body">
                <h4 class="form-section"><i class="ft-file-text"></i> Pistas Habilitadas para {{fullname($piloto->user->id)}}</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" name="rut" value="{{$piloto->user->rut}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                              <label for="nombre">Nombre Completo</label>
                              <input type="text" class="form-control" name="nombre" value="{{fullname($piloto->user->id)}}" readonly>
                            </div>
                          </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="start_fecha">Regiones</label>
                          <div class="position-relative">
                            <select id="region" class="form-control" required>
                                <option selected disabled>Seleccione una Región</option>
                                <option value="0">Todas las Regiones</option>
                                @foreach ($regions as $region)
                                  <option value="{{$region->id}}">{{ getFullRegionName($region->id) }}</option>
                                @endforeach  
                            </select>
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- Select all -->
                            <allregion id="allregion0" style="display: none;">
                            <input type="checkbox" class="allregion" region="0"> <b>Todos los Aeropuetos del País</b><br>
                            </allregion>
                            @foreach ($regions as $region)
                            <allregion id="allregion{{$region->id}}" style="display: none;">
                            <input type="checkbox" class="allregion" region="{{$region->id}}"> <b>Todos los Aeropuetos de la Región {{ getFullRegionName($region->id) }} </b><br>
                            </allregion>
                            @endforeach  
                            <!-- Aeropuertos -->
                            <?php $pam = []; if($piloto->airports != null) {
                              foreach ($piloto->airports as $pa) {$pam[] = $pa->airport->id;};}?>
                            @foreach ($airports as $a)
                            <airport class="region{{$a->region_id}}" style="display: none;">
                            <input type="checkbox" name="airports[]"
                            <?php if(in_array($a->id,$pam)){echo 'checked';} ?>
                            value="{{$a->id}}"> {{$a->oaci}} - {{$a->nombre}}<br>
                            </airport>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-raised btn-raised btn-success">
                            <i class="fa fa-check-square-o"></i> Guardar Pistas
                        </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

</section>
@endsection

@section('custom_js')
<script>
/* Mostrar Aeropuertos segun region */
$( "#region" ).change(function() {
  if($(this).val() == 0) {
    $('allregion').hide();
    $('#allregion0').show();
    $('airport').show();
  } else {
    $('allregion').hide();
    $('airport').hide();
    $('#allregion'+$(this).val()).show();
    $('.region'+$(this).val()).show();
  }
});
/* Seleccionar o Deseleccionar Todos los Aeropuertos de una Region */
$(".allregion").change(function() {
  var current_region = $(this).attr('region');
  if (current_region == 0) {
    var quienes = 'airport input';
  } else {
    var quienes = '.region'+current_region+' input';
  }
  if(this.checked) {
      $(quienes).attr('checked', 'checked');
  } else {
    $(quienes).removeAttr('checked');
  }
});
</script>
@endsection