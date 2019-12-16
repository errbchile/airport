<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloBitacora extends Model
{
    public function vuelo()
    {
        return $this->belongsTo('App\Vuelo', 'vuelo_id');

    }

    public function airport()
    {
        return $this->belongsTo('App\Airport', 'airport_id');

    }
}
