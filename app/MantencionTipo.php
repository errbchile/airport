<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantencionTipo extends Model
{
    public function tareas(){
    	return $this->hasMany('App\MantencionTipoTarea','mantencion_tipo_id');
    }
    public function mantencions(){
    	return $this->hasMany('App\Mantencion','mantencion_tipo_id');
    }
}
