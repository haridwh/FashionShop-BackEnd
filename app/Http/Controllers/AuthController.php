<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
      $credentials = $request->only('uname', 'upass');
      try {
        if (! $token = JWTAuth::attempt($credentials)) {
          return $this->jsonResponse('FAILED_POST','USER_NOT_FOUND', null);
        }
      } catch (JWTException $e) {
        return response()->json(['status'=>'FAILED_POST','message'=>'SERVER_ERROR','content'=>['error' => $e]]);
      }
      $user = User::where('uname', $request->only('uname'))->first();
      $type = $user->type;
    }
}
