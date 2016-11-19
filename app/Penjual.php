<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use SoftDeletes;

    protected $table = 'penjual';
    public $timestamps = false;

    protected $fillable = ['nip','id_user',];
}
