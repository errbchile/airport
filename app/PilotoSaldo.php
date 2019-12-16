<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilotoSaldo extends Model
{
    public function piloto() {
        return $this->belongsTo('App\Piloto','piloto_id');
    }
}
