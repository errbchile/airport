 
@extends('layouts.app')

@section('content')
<section id="configuration">
 <div class="row">
    <div class="col-sm-12">
      <div align="center" class="content-header">Editar la Modalidad: {{ $vuelotipo->nombre . ", Monto Actual: " . clp($vuelotipo->monto) }}</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
            <form id="myform" class="form" method="POST" action="{{ route('vuelotipos.update') }}" autocomplete="form">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-body">

                <h4 class="form-section"><i class="fa fa-file"></i> Ingrese el nuevo monto</h4>

                <div class="row">
            	<input name="id" value="{{ $vuelotipo->id }}" type="hidden">
            	
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="monto">Monto</label>
                      <input type="number" id="monto" class="form-control" name="monto" value="{{ $vuelotipo->monto }}" required>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <a href="{{ route('vuelotipos') }}">
                      <button type="button" class="btn btn-light">
                          <i class="fas fa-chevron-circle-left"></i> Regresar
                      </button>
                  </a>
                  <button type="submit" class="btn btn-raised btn-raised btn-success">
                    <i class="fa fa-check-square-o"></i> Actualizar
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