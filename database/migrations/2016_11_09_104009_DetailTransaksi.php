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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jml');
            $table->double('harga');
            $table->softDeletes();

            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id')->on('transaksi');

            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->references('id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
