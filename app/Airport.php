<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function region() {
        return $this->belongsTo('App\Region','region_id');

    }
    public function salidas() {
        return $this->hasMany('App\VueloSalida','airport_id');

    }
    public function llegadas() {
        return $this->hasMany('App\VueloLlegada','airport_id');

    }
    public function pilotos() {
        return $this->hasMany('App\PilotoAirport','airport_id');

    }
}
