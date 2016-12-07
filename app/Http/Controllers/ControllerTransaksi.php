<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;
use App\Produk;

class ControllerTransaksi extends BaseResController
{
    public function getAllVerify(){
      $transaksi = Transaksi::where([['status','<>','cart'],['status','<>','verified']])->get();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $transaksi);
    }

    public function getAllDelivery(){
      $transaksi = Transaksi::where('status','verified')->get();
      return $this->jsonResponse('SUCCESS_GET','OK',$transaksi);
    }

    public function getAllTransaksiByID($id){
      $transaksi = Transaksi::where('id_pembeli',$id)->get();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $transaksi);
    }

    public function insertDetail($id, Request $request){
      $detailTransaksi = new DetailTransaksi();
      $detailTransaksi->jml = $request->input('jml');
      $detailTransaksi->id_transaksi = $id;
      $detailTransaksi->id_produk = $request->input('id_produk');
      $detailTransaksi->save();

      $produk = Produk::find($detailTransaksi->id_produk);
      $produk->stok -= $request->input('jml');
      $produk->save();

      $transaksi = Transaksi::where('status','cart')->first();
      $harga = $produk->harga;
      $transaksi->total += ($detailTransaksi->jml * $harga);
      $transaksi->save();
      if (DetailTransaksi::find($id)) {
          return $this->jsonResponse('SUCCESS_POST', 'OK', null);
      }
      return $this->jsonResponse('FAILED_POST', 'FAILED INSERT TRANSAKSI', null);
    }

    public function createCart(Request $request){
      $transaksi = Transaksi::where([['status','=','cart'],['id_pembeli','=',$request->input('id_pembeli')]])->first();
      if ($transaksi != null) {
        return $this->insertDetail($transaksi->id, $request);
      }
      $transaksi = new Transaksi();
      $transaksi->status = 'cart';
      $transaksi->total = 0;
      $transaksi->waktu = date("Y/m/d H:i:s");
      $transaksi->id_pembeli = $request->input('id_pembeli');
      $transaksi->save();
      if (Transaksi::find($transaksi->id)) {
        return $this->insertDetail($transaksi->id, $request);
      }
      return $this->jsonResponse('FAILED_POST', 'FAILED INSERT TRANSAKSI', null);
    }

    public function createTransaksi($id){
      $transaksi = Transaksi::where([['status','=','cart'],['id_pembeli','=',$id]])->first();
      if ($transaksi == null) {
        return $this->jsonResponse('FAILED_UPDATE', $id.' NOT FOUND', null);
      }
      $transaksi->status = 'unverified';
      $transaksi->save();
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
