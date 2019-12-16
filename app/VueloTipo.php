<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloTipo extends Model
{
    public function vuelos() {
        return $this->hasMany('App\Vuelo','vuelo_tipo_id');
    }
}
