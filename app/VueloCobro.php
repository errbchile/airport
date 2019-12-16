<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloCobro extends Model
{
    public function vuelo() {
        return $this->belongsTo('App\Vuelo','vuelo_id');
    }
}
