<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Models\Remaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RemajaController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $remaja = Remaja::where('user_id', $user->id_user)->first();

        if ($remaja) {
            $remaja->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'sekolah' => $request->sekolah,
            ]);

            // Cek apakah ada foto baru yang diunggah
            if ($request->hasFile('foto_profile')) {
                $file = $request->file('foto_profile');
                $foto_profile = Str::random() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/profile/'), $foto_profile);

                // Hapus foto lama jika ada
                if ($remaja->foto_profile) {
                    Storage::delete('profile/' . $remaja->foto_profile);
                }

                $remaja->foto_profile = $foto_profile;
            }

            // $remaja->save();

            return response()->json(['message' => 'Profil berhasil diperbarui', 'data' => $remaja], 200);
        } else {
            return response()->json(['message' => 'Data Remaja tidak ditemukan'], 404);
        }
    }
}
