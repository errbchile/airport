<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilotoHora extends Model
{
    public function piloto() {
        return $this->belongsTo('App\User','piloto_id');
    }
}
