<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout(){
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message'=>'logout sukses'], 200);
    }
}
