<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjual;

class ControllerPenjual extends BaseResController
{
    public function RegistrasiPenjual(Request $request){
    	$Penjual = new Penjual();
    	$Penjual->id_user = $request->input('id_user');
    	$Penjual->nip = $request->input('nip');
    	$Penjual->save();

    return redirect('UIPenjual');//buat diroutes buat ngakses diwebnya nnti
    }

}
