<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;

class ControllerTransaksi extends BaseResController
{
    $idCart = null;

    public function getAllTransaksi(){
      $transaksi = Transaksi::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $transaksi);
    }

    public function createCart(Request $request){
      if ($idCart != null) {
        return insertDetail($idCart, $request);
      }
      $transaksi = new Transaksi();
      $transaksi->status = 'cart';
      $transaksi->total = 0;
      $transaksi->waktu = date("Y/m/d H:i:s");
      $transaksi->id_pembeli = $request->input('id_pembeli');
      $transaksi->save();
      $this->$idCart = $transaksi->id;
      if (Transaksi::find($transaksi->id)) {
        return insertDetail($id, Request $request);
      }
      return $this->jsonResponse('FAILED_POST', 'FAILED INSERT TRANSAKSI', null);
    }

    public function insertDetail($id, Request $request){
      $detailTransaksi = new DetailTransaksi();
      $detailTransaksi->nama = $request->input('nama');
      $detailTransaksi->jml = $request->input('jml');
      $detailTransaksi->harga = $request->input('harga');
      $detailTransaksi->id_transaksi = $id;
      $detailTransaksi->id_produk = $request->input('id_produk');
      $detailTransaksi->save();

      $transaksi = Transaksi::find($idCart);
      $transaksi->total = $Transaksi->total+ ($detailTransaksi->jml * $detailTransaksi->harga);
      $transaksi->save();
      if (DetailTransaksi::find($id)) {
          return $this->jsonResponse('SUCCESS_POST', 'OK', null);
      }
      return $this->jsonResponse('FAILED_POST', 'FAILED INSERT TRANSAKSI', null);
    }

    public function createTransaksi(){
      $transaksi = Transaksi::find($this->$idCart);
      if ($transaksi == null) {
        return $this->jsonResponse('FAILED_UPDATE', $id.' NOT FOUND', null);
      }
      $transaksi->status = 'unverified';
      $transaksi->save();
      $idCart = null;
      return $this->jsonResponse('SUCCESS_UPDATE', 'OK', null);
    }

    public function verified($id){
      $transaksi = Transaksi::find($id);
      if ($transaksi == null) {
        return $this->jsonResponse('FAILED_UPDATE', $id.' NOT FOUND', null);
      }
      $transaksi->status = 'verified';
      $transaksi->save();
      return $this->jsonResponse('SUCCESS_UPDATE', 'OK', null);
    }

    public function deleteTransaksi($id){
      $transaksi = Transaksi::find($id);
      if ($transaksi == null) {
        return $this->jsonResponse('FAILED_DELETE', $id.' NOT FOUND', null);
      }
      $transaksi->delete();
      return $this->jsonResponse('SUCCESS_DELETE', 'OK', null);
    }
}
