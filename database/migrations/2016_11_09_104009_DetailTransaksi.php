<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailTransaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jml');
            $table->double('harga');

            $table->integer('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('Transaksi');

            $table->integer('id_produk');
            $table->foreign('id_produk')->references('id')->on('Produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DetailTransaksi');
    }
}
