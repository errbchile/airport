<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    public function airplane() {
        return $this->belongsTo('App\Airplane','airplane_id');
    }
    public function tipo() {
        return $this->belongsTo('App\VueloTipo','vuelo_tipo_id');
    }
    public function solicitud() {
        return $this->hasOne('App\VueloSolicitud','vuelo_id');
    }
    public function salida() {
        return $this->hasOne('App\VueloSalida','vuelo_id');
    }
    public function llegada() {
        return $this->hasOne('App\VueloLlegada','vuelo_id');
    }
    public function cobros() {
        return $this->hasOne('App\VueloCobro','vuelo_id');
    }
    public function users() {
        return $this->hasMany('App\VueloUser','vuelo_id');
    }
    public function piloto() {
        return $this->hasOne('App\VueloUser','vuelo_id')->where('rol',1);
    }
    public function copiloto() {
        return $this->hasOne('App\VueloUser','vuelo_id')->where('rol',2);
    }
    public function rechazos() {
        return $this->hasMany('App\VueloRechazo','vuelo_id');
    }
    public function bitacoras() {
        return $this->hasMany('App\VueloBitacora','vuelo_id');
    }
    public function mantencion() {
        return $this->hasOne('App\Mantencion','vuelo_id');
    }
}
