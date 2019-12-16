<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    public function mantencions() {
        return $this->hasMany('App\Mantencion','mantencion_id');
    }
}
