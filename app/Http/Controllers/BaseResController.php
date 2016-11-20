<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseResController extends Controller
{
    public function jsonResponse($code, $message, $content) {
        return response()->json(['code' => $code,'message' => $message, 'content' => $content]);
    }
}
