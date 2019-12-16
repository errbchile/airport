<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantencionTipoTarea extends Model
{
    public function tipo(){
    	return $this->belongsTo('App\MantencionTipo', 'mantencion_tipo_id');
    }

    public function tarea(){
    	return $this->belongsTo('App\MantencionTareaList', 'mantencion_tarea_list_id');
    }
}
