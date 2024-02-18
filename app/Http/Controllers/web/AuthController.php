<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            "username" => "required|string",
            "password" => "required|string"
        ]);
        $user = User::where('username', $request->username)->first();
        if($user && $user->role == 'superadmin'){
            if(auth()->attempt($credentials)){
                $api_token = $user->createToken('api_token')->plainTextToken;
                return redirect('/admin/podcast')->with('api_token', $api_token);
            }
            return back()->withErrors([
                "message" => "data user tidak valid"
            ]);
        }else{
            return back()->withErrors([
                "message" => "data user tidak valid"
            ]);
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}


