<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->double('total');
            $table->timestamp('waktu');
            $table->softDeletes();


            $table->integer('id_pembeli');
            $table->foreign('id_pembeli')->references('id')->on('Pembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transaksi');
    }
}
