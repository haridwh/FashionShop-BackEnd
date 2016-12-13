<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;
use App\Transaksi;

class ControllerDetailTransaksi extends BaseResController
{

    public function deleteDetailTransaksi($id){
      $detailTransaksi = DetailTransaksi::where('id',$id)->with('produk')->first();
      $id_tran = $detailTransaksi->id_transaksi;
      $jml = $detailTransaksi->jml * $detailTransaksi->produk->harga;

      $transaksi = Transaksi::find($id_tran);
      $transaksi->total -= $jml;
      $transaksi->save();
      DetailTransaksi::destroy($id);
      return $this->jsonResponse('SUCCESS_DELETE','OK',null);
    }
}
