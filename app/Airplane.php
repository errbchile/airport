<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{

    public function horas() {
        return $this->hasOne('App\AirplaneHora','airplane_id');
    }

    public function model() {
        return $this->belongsTo('App\AirplaneModel','airplane_model_id');
    }
    public function vuelos() {
        return $this->hasMany('App\Vuelo','airplane_id');
    }
    public function alertastacometro() {
        return $this->hasMany('App\AirplaneAlertTacometro','airplane_id');
    }
    public function piezas() {
        return $this->hasMany('App\AirplanePieza','airplane_id');
    }
    public function mantencions() {
        return $this->hasMany('App\Mantencion','airplane_id');
    }

}
