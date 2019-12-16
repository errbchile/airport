<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneModel extends Model
{
    public function brand() {
        return $this->belongsTo('App\AirplaneBrand','airplane_brand_id');
    }

    public function airplanes() {
        return $this->hasMany('App\Airplane','airplane_model_id');
    }

    public function pilotos() {
        return $this->hasMany('App\PilotoAirplaneModel','airplane_model_id');
    }

    public function piezas(){
    	return $this->hasMany('App\Pieza', 'airplane_model_id');
    }
}
