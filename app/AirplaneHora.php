<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneHora extends Model
{
    public function airplane() {
        return $this->belongsTo('App\Airplane','airplane_id');
    }
}
