<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','slug','description','image','tags','status'];
}
