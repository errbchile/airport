<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function administrator() {
        return $this->hasOne('App\Administrator','user_id');
    }
    public function piloto() {
        return $this->hasOne('App\Piloto','user_id');
    }
    public function vuelos() {
        return $this->hasMany('App\VueloUser','user_id');
    }
    public function notifications() {
        return $this->hasMany('App\Notification','user_id');
    }
    public function hasnotifications() {
        return $this->hasMany('App\Notification','user_id')->where('status',1);
    }
    public function mecanico() {
        return $this->hasOne('App\Mecanico','user_id');
    }

}
