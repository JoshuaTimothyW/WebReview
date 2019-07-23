<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $table = 'media';
    
    public $timestamps = false;

    function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

}
