<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pembeli;
use App\Penjual;
use App\Kurir;

class ControllerUsers extends BaseResController
{
    public function getAllUser(){
    	$users = User::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $users);
    }

    public function getDetailUser($id){
      $user = User::find($id);
      if ($user == null) {
        return $this->jsonResponse('FAILED_GET', $id.' NOT FOUND', null);
      }
      return $this->jsonResponse('SUCCESS_GET', 'OK', $user);
    }

    public function registrationPembeli(Request $request){
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->uname = $request->input('uname');
      $user->password = bcrypt($request->input('upass'));
      $user->type = $request->input('type');
      //$user->image_url = $request->input('image_url');
      $user->save();
      if (User::find($user->id)) {
        $pembeli = new Pembeli();
        $pembeli->jenis_kelamin = $request->input('jenis_kelamin');
        $pembeli->tgl_lahir = $request->input('tgl_lahir');
        $pembeli->alamat = $request->input('alamat');
        $pembeli->nomor_tlp = $request->input('nomor_tlp');
        $pembeli->id_user = $user->id;
        $pembeli->save();
        if (Pembeli::find($pembeli->id)) {
          return $this->jsonResponse('SUCCESS_POST','SUCCESS REGISTRATION',null);
        }
        return $this->jsonResponse('SUCCESS_POST','FAILED INSERT PEMBELI',null);
      }
      return $this->jsonResponse('SUCCESS_POST', 'FAILED INSERT USER', null);
    }

    public function registrationPenjual(Request $request){
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->uname = $request->input('uname');
      $user->password = bcrypt($request->input('upass'));
      $user->type = $request->input('type');
      $user->save();
      if (User::find($user->id)) {
        $penjual = new Penjual();
        $penjual->nip = $request->input('nip');
        $penjual->id_user = $user->id;
        $penjual->save();
        if (Penjual::find($penjual->id)) {
          return $this->jsonResponse('SUCCESS_POST','SUCCESS REGISTRATION',null);
        }
        return $this->jsonResponse('SUCCESS_POST','FAILED INSERT PENJUAL',null);
      }
      return $this->jsonResponse('SUCCESS_POST', 'FAILED INSERT USER', null);
    }

    public function registrationKurir(Request $request){
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->uname = $request->input('uname');
      $user->password = bcrypt($request->input('upass'));
      $user->type = $request->input('type');
      $user->save();
      if (User::find($user->id)) {
        $kurir = new Kurir();
        $kurir->nip = $request->input('nip');
        $kurir->id_user = $user->id;
        $kurir->save();
        if (Kurir::find($kurir->id)) {
          return $this->jsonResponse('SUCCESS_POST','SUCCESS REGISTRATION',null);
        }
        return $this->jsonResponse('SUCCESS_POST','FAILED INSERT PENJUAL',null);
      }
      return $this->jsonResponse('SUCCESS_POST', 'FAILED INSERT USER', null);
    }
}
