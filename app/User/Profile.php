<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'user_id','age','address','experience','hair','height','eyes','weight','mobile','interest',
    ];
}
