<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    protected $fillable = ['name', 'email', 'uname', 'password', 'type', 'image_url'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function penjual(){
      return $this->hasOne('App\Penjual','id_user');
    }

    public function pembeli(){
      return $this->hasOne('App\Pembeli','id_user');
    }
}
