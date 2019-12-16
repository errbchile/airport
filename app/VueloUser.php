<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VueloUser extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    public function vuelo() {
        return $this->belongsTo('App\Vuelo','vuelo_id');
    }
}
