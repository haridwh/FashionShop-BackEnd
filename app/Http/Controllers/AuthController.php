<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

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
      $id = $user->id;
      return $this->jsonResponse('SUCCESS_POST','OK', ['apiKey' => $token, 'type' => $type, 'id' => $id]);
    }
}
