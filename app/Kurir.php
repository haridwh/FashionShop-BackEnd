<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table = 'kurir';
    public $timestamps = false;

    protected $fillable = ['nip','id_user'];

    public function user(){
      return $this->belongsTo('App\User','id_user');
    }

    public function transaksi(){
      return $this->hasMany('App\Transaksi', 'id_kurir');
    }
}
