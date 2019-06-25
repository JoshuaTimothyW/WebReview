<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public $timestamps = false;

    function forums(){
    	return $this->hasMany('App\Forum');
    }
    
    function threads(){
        return $this->hasMany('App\Thread');
    }
}
