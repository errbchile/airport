@extends('layouts.app')

@section('content')
<section id="flight_requests_create">

<div class="row">
    <div class="col-sm-12">
        <div class="content-header">Marca de Avión</div>
    </div>
</div>

<!-- Marca de avión -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="px-3 pt-3">
              <div class="form-body">

                <h4 class="form-section"><i class="ft-file-text"></i> Marca de Avión</h4>

                <div class="row">
                    <div class="card-header">
                    <h4 class="card-title">Marca</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$airplanebrand->nombre}}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>



</section>
@endsection