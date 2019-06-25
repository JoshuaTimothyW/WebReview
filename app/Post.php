<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'post';
    
    public $timestamps = false;

    function members(){
        return $this->belongsTo(Member::class,'user_id');
    }

    function threads(){
        return $this->hasMany('App\Thread');
    }
}
