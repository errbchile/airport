<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilotoTipo extends Model
{
    public function piloto() {
        return $this->hasMany('App\Piloto','piloto_tipo_id');
    }
}
