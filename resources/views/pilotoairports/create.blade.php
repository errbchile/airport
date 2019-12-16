@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Detalles</div>
    </div>
</div>

<!-- PISTAS HABILITADAS PARA EL PILOTO -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('pilotoairports.update', ['piloto_id'=>$piloto->id]) }}">
                        {{ csrf_field() }}
              <div class="form-body">
                <h4 class="form-section"><i class="ft-file-text"></i> Pistas habilitadas para el piloto </h4>
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
                        <?php $pam = []; if($piloto->airports != null) {foreach ($piloto->airports as $p) {$pam[] = $p->nombre->id;};}?>
                        @foreach ($airports as $m)
                            <input type="checkbox" name="airports[]"
                            <?php if(in_array($m->id,$pam)){echo 'checked';} ?>
                            value="{{$m->id}}"> {{$m->nombre}}<br>
                        @endforeach
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-raised btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Editar
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