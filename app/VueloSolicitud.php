<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloSolicitud extends Model
{
    protected $table = 'vuelo_solicitudes';

    public function vuelo() {
        return $this->belongsTo('App\Vuelo','vuelo_id');
    }
}
