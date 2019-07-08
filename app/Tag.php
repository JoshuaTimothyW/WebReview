<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tag";
    public $timestamps = false;
    
    function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

    // function item(){
    //     return $this->hasMany(PostItem::class,'id');
    // }
    
}
