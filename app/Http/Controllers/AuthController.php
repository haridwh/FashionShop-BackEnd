<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Penjual;
use App\Pembeli;
use App\Kurir;

class AuthController extends BaseResController
{
    public function login(Request $request){
      $credentials = $request->only('uname', 'password');
      try {
        if (! $token = JWTAuth::attempt($credentials)) {
          return $this->jsonResponse('FAILED_POST','USER_NOT_FOUND', null);
        }
      } catch (JWTException $e) {
        return $this->jsonResponse('FAILED_POST','SERVER_ERROR', null);
      }
      $user = User::where('uname', $request->only('uname'))->first();
      $type = $user->type;
      $name = $user->name;
      if ($type==1) {
        $penjual = Penjual::where('id_user',$user->id)->first();
        $id = $penjual->id;
      }else if($type==2){
        $pembeli = Pembeli::where('id_user',$user->id)->first();
        $id = $pembeli->id;
      }else if($type==3){
        $kurir = Kurir::where('id_user',$user->id)->first();
        $id = $kurir->id;
      }
      return $this->jsonResponse('SUCCESS_POST','OK', ['apiKey' => $token, 'type' => $type, 'name' => $name, 'id' => $id]);
    }
}
