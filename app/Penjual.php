<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = 'penjual';
    public $timestamps = false;

    protected $fillable = ['nip','id_user'];

    public function user(){
      return $this->belongsTo('App\User', 'id_user');
    }
}
