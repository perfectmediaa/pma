<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
    'user_id',
    'amount',
    'type',
    'note' ];
}
