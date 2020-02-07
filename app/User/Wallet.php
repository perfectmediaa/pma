<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }
    protected $fillable = [
        'user_id','balance'
    ];
}
