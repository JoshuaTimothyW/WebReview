<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'comment';

    public $timestamps = false;

    function forums(){
    	return $this->belongsTo(Post::class,'post_id');
    }

    function members(){
        return $this->belongsTo(Member::class,'user_id');
    }
}
