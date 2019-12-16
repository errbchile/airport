<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    public function horas() {
        return $this->hasOne('App\PilotoHora','piloto_id');
    }
    public function tipo() {
        return $this->belongsTo('App\PilotoTipo','piloto_tipo_id');
    }
    public function airplanemodels() {
        return $this->hasMany('App\PilotoAirplaneModel','piloto_id');
    }
    public function airports() {
        return $this->hasMany('App\PilotoAirport','piloto_id');
    }
    public function saldos() {
        return $this->hasMany('App\PilotoSaldo','piloto_id');
    }
}
