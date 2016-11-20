<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ControllerUsers extends BaseResController
{
    public function TambahUser(Request $request){
    	$Users = new User();
    	$Users->email = $request->input('email');
    	$Users->uname = $request->input('uname');
    	$Users->upass = $request->input('upass');
    	$Users->name = $request->input('name');

    	$Users->save();
    	return redirect('UIUsers');//buat diroutes buat ngakses diwebnya nnti
    }

    public function getAllUser(){
    	$users = User::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $users);
    }

    public function registration(Request $request){
      $user = new User();
      $user->nama = $request->input('name');
      $user->email = $request->input('email');
      $user->uname = $request->input('uname');
      $user->upass = $request->input('upass');
      $user->save();
      $user->pembeli()->jenis_kelamin = $request->input('jenis_kelamin');
      $user->pembeli()->tgl_lahir = $request->input('tgl_lahir');
      $user->pembeli()->alamat = $request->input('alamat');
      $user->pembeli()->nomor_tlp = $request->input('nomor_tlp');
      $user->pembeli()->id_user = $user->id;
      $user->pembeli()->save();
    }

    public function search(){
    	$Users = User::where('id',$id)->first();
    	return $Users;
    }

    public function updateUser(Request $request,$id){
    	$Users = $Users::where('id',$request->input('id'));
    	$Users->email = $request->input('email');
    	$Users->uname = $request->input('uname');
    	$Users->upass = $request->input('upass');
    	$Users->name = $request->input('name');
    	$Users->remember_token = $request->input('remember_token');
    	$Users->save();

    	return redirect('UIUsers');
    }

    public function deleteUser ($id){
    	$Users = User::where('id',$id);
    	$Users->delete();

    	return redirect('UIUsers');
    }
}
