<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloSalida extends Model
{
    public function airport()
    {
        return $this->belongsTo('App\Airport', 'airport_id');

    }

    public function vuelo()
    {
        return $this->belongsTo('App\Vuelo', 'vuelo_id');

    }
}
