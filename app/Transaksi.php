<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $table = 'transaksi';

    protected $fillable = ['status', 'total', 'waktu', 'id_pembeli',];
}
