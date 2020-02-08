<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelform extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = ['user_id','name','address'];
}
