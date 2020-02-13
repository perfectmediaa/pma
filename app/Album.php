<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function images(){
        return $this->hasMany('App\Image');
    }
    protected $fillable = [
        'user_id','name','cover_image'
    ];
}
