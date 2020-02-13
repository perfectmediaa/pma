<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\User\profile');
    }
    public function album(){
        return $this->hasOne('App\album');
    }
    public function wallet(){
       return $this->hasOne('App\User\Wallet');
    }
    public function modelform(){
        return $this->hasOne('App\Modelform');
    }
    public function transaction(){
         return $this->hasMany('App\User\Transaction');
    }

    protected static function boot(){
        parent::boot();
        static::created(function($user){
            $user->profile()->create([
                'user_id' => $user->id,
            ]);
            $user->wallet()->create([
                'user_id' => $user->id,
            ]);
            $user->album()->create([
                'user_id' => $user->id,
                'name' => $user->name,
            ]);
        });
    }
}
