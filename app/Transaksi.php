<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;

    protected $fillable = ['status', 'total', 'waktu', 'id_pembeli'];

    public function pembeli(){
      return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }

    public function detailTransaksi(){
      return $this->hasMany('App\DetailTransaksi','id_transaksi');
    }

    public function kurir(){
      return $this->belongsTo('App\Kurir','id_kurir');
    }
}
