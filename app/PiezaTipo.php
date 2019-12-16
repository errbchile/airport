<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PiezaTipo extends Model
{
    public function piezas(){
    	return $this->hasMany('App\Pieza', 'pieza_tipo_id');
    }

}
