<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
class ControllerTransaksi extends BaseResController
{

    public function getAllTransaksi(){
      $transaksi = Transaksi::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $transaksi);
    }

    public function create(Request $request){
      $transaksi = new Transaksi();
      $transaksi->status = 'pending'; //belum upload bukti bayar
      $transaksi->total = $request->input('total');
      $transaksi->waktu = $date("Y/m/d H:i:sa");
      $transaksi->save();
      return redirect('UIProduk');//redirect ke ui produk setelah tambah produk
    }

    public function read($id){
      $transaksi = Transaksi::where('id',$id)->first();
      return $transaksi;
    }

    public function updateStatus($id){
      $transaksi = Transaksi::where('id',$id)
      $transaksi->status = 'Lunas';
      $transaksi->save
    }

    public function delete($id){
      $transaksi = Transaksi::where('id',$id)->first();
      $transaksi->delete();
    }
}
