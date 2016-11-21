<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;

class ControllerDetailTransaksi extends BaseResController
{

    public function getAllDetailTransaksi(){
      $detailTransaksi = new DetailTransaksi::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $detailTransaksi);
    }

    public function getDetailTransaksi($id){
      $detailTransaksi = DetailTransaksi::find($id);
      if ($detailTransaksi == null) {
        return $this->jsonResponse('FAILED_GET', $id.' NOT FOUND', null);
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
