<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantencionTareaList extends Model
{
    public function tipos(){
    	return $this->hasMany('App\MantencionTipoTarea','mantencion_tarea_list_id');
    }
}
