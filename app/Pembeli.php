<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    public $timestamps = false;

    protected $fillable = ['jenis_kelamin', 'tgl_lahir', ' alamat', 'nomor_tlp'];
}
