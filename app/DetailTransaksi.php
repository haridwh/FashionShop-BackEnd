<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    public $timestamps = false;

    protected $fillable = ['nama', 'jml', 'harga', 'id_transaksi', 'id_produk'];

    public function produk(){
      return $this->belongsTo('App\Produk','id_produk');
    }

    public function transaksi(){
      return $this->belongsTo('App\Transaksi','id_transaksi');
    }
}
