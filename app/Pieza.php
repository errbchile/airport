<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    public function model(){
    	return $this->belongsTo('App\AirplaneModel', 'airplane_model_id');
    }

    public function airplanepieza(){
    	return $this->hasOne('App\AirplanePieza', 'pieza_id');
	}
	
    public function piezatipo(){
    	return $this->belongsTo('App\PiezaTipo', 'pieza_tipo_id');
    }

    public function fabricante(){
        return $this->belongsTo('App\PiezaFabricante', 'pieza_fabricante_id');
    }
}
