<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use SoftDeletes;

    protected $table = 'produk';
    public $timestamps = false;

    protected $fillable = ['nama','deskripsi','kategori','stok','harga','image_url',];

    // public function transaksi(){
    //   return $this->belongsToMany('App\Transaksi','detail_transaksi','id_transaksi','id_produk');
    // }

    public function detailTransaksi(){
        return $this->hasMany('App\DetailTransaksi','id_produk');
    }
}
