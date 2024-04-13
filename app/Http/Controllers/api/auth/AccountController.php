<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function deleteAkun()
    {
        $user = auth()->user();
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Akun berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Tidak dapat menemukan pengguna'], 404);
        }
    }
}
