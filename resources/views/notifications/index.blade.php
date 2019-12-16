@extends('layouts.app')

@section('custom_css')
<style type="text/css">
.nuevanoti td{
    font-weight: 600;
}
</style>
@endsection

@section('content')
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Notificaciones</h4>
          <p class="card-text">En esta tabla encontrará todas las notificaciones a su usuario.</p>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Detalle</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($notifications->reverse() as $n)
                <tr class="<?php if ($n->status == 1) echo 'nuevanoti'; ?>">
                  <td>{{datetimeformat($n->created_at)}}</td>
                  <td>{{$n->detalle}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Fecha</th>
                  <th>Detalle</th>
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