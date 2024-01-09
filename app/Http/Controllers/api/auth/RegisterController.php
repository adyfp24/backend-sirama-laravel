<?php

namespace App\Http\Controllers\api\auth;

use App\Models\Ahli;
use App\Models\Guru;
use App\Models\Kader;
use App\Models\Orangtua;
use App\Models\Remaja;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string',
                'role' => 'required|in:orangtua,remaja,guru,ahli,kader'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            $role = $request->role;
            switch ($role) {
                case 'remaja':
                    $this->registRemaja($request, $user->id);
                    break;
                case 'orangtua':
                    $this->registOrangtua($request, $user->id);
                    break;
                case 'ahli':
                    $this->registAhli($request, $user->id);
                    break;
                case 'kader':
                    $this->registKader($request, $user->id);
                    break;
                case 'guru':
                    $this->registGuru($request, $user->id);
                    break;
            }

            DB::commit();

            return response()->json(['message' => 'Registrasi berhasil'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Registrasi gagal', 'error' => $e->getMessage()], 500);
        }
    }

    private function registRemaja(Request $request, $user_id)
    {
        $file = $request->file('foto_profile');
        $foto_profile = $file->store('uploads');

        Remaja::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'sekolah' => $request->sekolah,
            'foto_profile' => $foto_profile,
            'user_id' => $user_id,
        ]);
    }
    private function registGuru(Request $request, $user_id)
    {
        $file = $request->file('foto_profile');
        $foto_profile = $file->store('uploads');
        
        Guru::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jenis_guru' => $request->jenis_guru,
            'sekolah' => $request->sekolah,
            'foto_profile' => $foto_profile,
            'user_id' => $user_id
        ]);
    }
    private function registAhli(Request $request, $user_id)
    {
        $file = $request->file('foto_profile');
        $foto_profile = $file->store('uploads');

        Ahli::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jenis_ahli' => $request->jenis_ahli,
            'deskripsi_ahli' => $request->deskripsi_ahli,
            'foto_profile' => $foto_profile,
            'user_id' => $user_id
        ]);
    }
    private function registKader(Request $request, $user_id)
    {
        $file = $request->file('foto_profile');
        $foto_profile = $file->store('uploads');

        Kader::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'usia' => $request->usia,
            'wilayah_binaan' => $request->wilayah_binaan,
            'foto_profile' => $foto_profile,
            'user_id' => $user_id
        ]);
    }
    private function registOrangtua(Request $request, $user_id)
    {
        $file = $request->file('foto_profile');
        $foto_profile = $file->store('uploads');

        Orangtua::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'tingkat_sekolah_anak' => $request->tingkat_sekolah_anak,
            'foto_profile' => $foto_profile,
            'user_id' => $user_id
        ]);
    }
}