<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilotoAirport extends Model
{
    public function piloto() {
        return $this->belongsTo('App\Piloto','piloto_id');
    }
    public function airport() {
        return $this->belongsTo('App\Airport','airport_id');
    }
}
