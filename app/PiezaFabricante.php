<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PiezaFabricante extends Model
{
    public function piezas(){
    	return $this->hasMany('App\Pieza', 'pieza_fabricante_id');
    }
}
