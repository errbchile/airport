<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilotoAirplaneModel extends Model
{
    public function model() {
        return $this->belongsTo('App\AirplaneModel','airplane_model_id');
    }
    public function piloto() {
        return $this->belongsTo('App\Piloto','piloto_id');
    }
}
