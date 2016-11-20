<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;

class ControllerDetailTransaksi extends BaseResController
{
    public function create(Request $request){
      $detailTransaksi = new DetailTransaksi();
      $detailTransaksi->nama = $request->input('nama');
      $detailTransaksi->jml = $request->input('jml');
      $detailTransaksi->harga = $request->input('harga');
      $detailTransaksi->waktu = $date("Y/m/d H:i:sa");
      $detailTransaksi->id_transaksi = $request->input('id_transaksi');
      $detailTransaksi->id_produk = $request->input('id_produk');
      $detailTransaksi->save();
    }

    public function readAll(){
      $detailTransaksi = new DetailTransaksi::all();
      return view('viewDetailTransaksi',['listDetailTransaksi' => $detailTransaksi]);
    }

}
