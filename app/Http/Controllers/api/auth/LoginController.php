<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash; // Tambahkan use statement untuk Hash

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
            return response()->json(['message' => 'login gagal'], 401);
        }

        $api_token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['message' => 'login sukses', 'user' => $user, 'token' => $api_token], 200);
    }
}
