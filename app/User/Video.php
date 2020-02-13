<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name','video','user_id','display'
    ];
}
