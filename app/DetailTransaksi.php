<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use SoftDeletes;

    protected $table = 'detail_transaksi';
    public $timestamps = false;

    protected $fillable = ['nama', 'jml', 'harga', 'id_transaksi', 'id_produk',];
}
