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

    /**
     * Acceder a la tabla Profile desde User.
     */
    public function profile(){
      return $this->hasOne(Profile::class);
    }

    public function users(){
       return $this->hasMany(User::class);
    }
    public function groups(){   // exactamente no importa el nombe de la funcion
      return $this->belongsToMany(Group::class)->withTimestamps();
   }
   public function location(){
     return $this->hasOneThrough(Location::class, Profile::class);
   }
}
