<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplanePieza extends Model
{
    public function pieza(){
    	return $this->belongsTo('App\Pieza', 'pieza_id');
    }
    public function airplane(){
    	return $this->belongsTo('App\Airplane', 'airplane_id');
    }
}
