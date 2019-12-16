<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloRechazo extends Model
{
    public function vuelo()
    {
        return $this->belongsTo('App\Vuelo', 'vuelo_id');

    }
}
