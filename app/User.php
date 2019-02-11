<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function barstools(){
        return $this->hasMany('App\barstool');
    }
    public function bedrooms(){
        return $this->hasMany('App\bedroom');
    }
    public function carbinets(){
        return $this->hasMany('App\carbinet');
    }
    public function conferencetables(){
        return $this->hasMany('App\conferencetable');
    }
    public function dinsings(){
        return $this->hasMany('App\dinning');
    }
    public function fabricsofas(){
        return $this->hasMany('App\fabricsofa');
    }
    public function leathersofas(){
        return $this->hasMany('App\leathersofa');
    }
    public function outdoorfurnitures(){
        return $this->hasMany('App\outdoorfurniture');
    }
}
