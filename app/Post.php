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

    function comment(){
        return $this->hasMany('App\Comment');
    }

    function tag(){
        return $this->hasMany(Tag::class,'id');
    }

    function getCreateAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d, M Y H:i');
    }
}
