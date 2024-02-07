<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        if(auth()->attempt($credentials)){
            session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->withErrors([
            "message" => "data user tidak valid"
        ]);
    }
    public function register(){

    }
    public function logout(){

    }
}


