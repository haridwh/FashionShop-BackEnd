<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;

class ControllerDetailTransaksi extends BaseResController
{

    public function getAllDetailTransaksi($id){
      $detailTransaksi = DetailTransaksi::where('id_transaksi',$id)->get();
      for ($i=0; $i < $detailTransaksi; $i++) {

      }
      return $this->jsonResponse('SUCCESS_GET', 'OK', $detailTransaksi);
    }

    public function deleteDetailTransaksi($id){
      $detailTransaksi = DetailTransaksi::find($id);
      if ($detailTransaksi == null) {
        return $this->jsonResponse('FAILED_GET', $id.' NOT FOUND', null);
      }
      $detailTransaksi->delete();
    }
}
