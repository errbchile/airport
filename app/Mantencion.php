<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantencion extends Model
{
    public function airplane() {
        return $this->belongsTo('App\Airplane','airplane_id');
    }
    //está repetido
    public function mantenciontipo() {
        return $this->belongsTo('App\MantencionTipo','mantencion_tipo_id');
    }
    public function mecanico() {
        return $this->belongsTo('App\Mecanico','mecanico_id');
    }
    public function vuelo() {
        return $this->belongsTo('App\Vuelo','vuelo_id');
    }
    //repetido
    public function tipo() {
        return $this->belongsTo('App\MantencionTipo','mantencion_tipo_id');
    }
}
