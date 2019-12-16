@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Detalles</div>
    </div>
</div>

<!-- TAREAS DE CADA TIPO DE MANTENCIÓN -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form class="form" method="POST" action="{{ route('mantencion.tipos.update', ['id' => $tipo->id]) }}">
                        {{ csrf_field() }}
              <div class="form-body">
                <h4 class="form-section"><i class="ft-file-text"></i> Tipos de Mantenciones y Sus Tareas</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" value="{{$tipo->nombre}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <?php 
                            $pam = []; 
                            if($tipo->tareas != null) {
                                foreach ($tipo->tareas as $tt) {
                                    $pam[] = $tt->mantencion_tarea_list_id;
                                }
                            }
                        ?>
                        @foreach ($tareas as $ta)
                            <input type="checkbox" name="tipotareas[]"
                            <?php if(in_array($ta->id,$pam)){echo 'checked';} ?>
                            value="{{$ta->id}}"> {{$ta->descripcion}}<br>
                        @endforeach
                    </div>
                    <div class="form-actions">
                        <a href="{{ route('mantencion.tipos') }}">
                            <button type="button" class="btn btn-light">
                                <i class="fas fa-chevron-circle-left"></i> Regresar
                            </button>
                        </a>
                        <button type="submit" class="btn btn-raised btn-raised btn-success">
                            <i class="fa fa-check-square-o"></i> Actualizar
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