<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Models\Orangtua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrtuController extends Controller
{
    public function updateProfile(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $orangtua = Orangtua::where('user_id', $user->id_user)->first();

            if ($orangtua) {
                $orangtua->update([
                    'nama' => $request->nama,
                    'no_hp' => $request->no_hp,
                    'tingkat_sekolah_anak' => $request->tingkat_sekolah_anak,
                ]);

                // Cek apakah ada foto baru yang diunggah
                if ($request->hasFile('foto_profile')) {
                    $file = $request->file('foto_profile');
                    $foto_profile = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/profile/'), $foto_profile);

                    // Hapus foto lama jika ada
                    if ($orangtua->foto_profile) {
                        unlink(public_path('storage/profile/' . $orangtua->foto_profile));
                    }

                    $orangtua->foto_profile = $foto_profile;
                }
                $status = 'success';
                $message = 'Profil berhasil diperbarui';
                $data = $orangtua;
            } else {
                $status = 'failed';
                $message = 'profil remaja tidak ditemukan';
                $status_code = 404;
            }
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }
}
