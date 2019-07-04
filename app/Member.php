<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable implements JWTSubject
{
    use Notifiable;
    
    protected $table = 'members';
    protected $hidden = ['password'];
    public $timestamps = false;

    function post(){
    	return $this->hasMany('App\Post','id');
    }
    
    function comment(){
        return $this->hasMany('App\Comment');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
}
