<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');

    }
    public function airports()
    {
        return $this->hasMany('App\Airport', 'region_id');

    }
}
