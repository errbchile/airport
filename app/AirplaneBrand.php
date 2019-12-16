<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneBrand extends Model
{
    public function model() {
        return $this->hasMany('App\AirplaneModel','airplane_brand_id');
    }
}
