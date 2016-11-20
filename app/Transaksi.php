<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $table = 'transaksi';

    protected $fillable = ['status', 'total', 'waktu', 'id_pembeli'];

    public function pembeli(){
      return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }

    public function detailTransaksi(){
      return $this->hasMany('App\DetailTransaksi','id_transaksi');
    }

    // public function produk(){
    //   return $this->belongsToMany('App\Produk','detail_transaksi','id_transaksi','id_produk');
    // }
}
