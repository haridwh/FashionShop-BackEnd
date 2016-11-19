<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use SoftDeletes;

    protected $table = 'produk';
    public $timestamps = false;

    protected $fillable = ['nama','deskripsi','kategori','stok','harga','image_url',];
}
