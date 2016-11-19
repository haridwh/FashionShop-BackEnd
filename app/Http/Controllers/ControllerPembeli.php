<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPembeli extends Controller
{
    public function RegistrasiPembeli(Request $request){
    	$Pembeli = new Pembeli();
    	$Pembeli->id_user = $request->input('id_user');
    	$Pembeli->jenis_kelamin = $request->input('jenis_kelamin');
    	$Pembeli->tgl_lahir = $request->input('tgl_lahir');
    	$Pembeli->alamat = $request->input('alamat');
    	$Pembeli->nomor_tlp = $request->input('nomor_tlp');
    	$Pembeli->save();

    	return redirect('UIPembeli');//buat diroutes buat ngakses diwebnya nnti
    }

    public function UpdatePembeli(Request $request){
    	$Pembeli = $Pembeli::where('id', $request->input('id')) ;
    	$Pembeli->jenis_kelamin = $request->input('jenis_kelamin');
    	$Pembeli->tgl_lahir = $request->input('tgl_lahir');
    	$Pembeli->alamat = $request->input('alamat');
    	$Pembeli->nomor_tlp = $request->input('nomor_tlp');
    	$Pembeli->save();

    return redirect('UIProfilePembeli');//buat diroutes buat ngakses diwebnya nnti
    }

}
