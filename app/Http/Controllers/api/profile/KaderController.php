<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KaderController extends Controller
{
    public function updateProfile(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $kader = Kader::where('user_id', $user->id_user)->first();
    
            if ($kader) {
                $kader->update([
                    'nama' => $request->nama,
                    'no_hp' => $request->no_hp,
                    'usia' => $request->usia,
                    'wilayah_binaan' => $request->wilayah_binaan,
                ]);
    
                // Cek apakah ada foto baru yang diunggah
                if ($request->hasFile('foto_profile')) {
                    $file = $request->file('foto_profile');
                    $foto_profile = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/profile/'), $foto_profile);
    
                    // Hapus foto lama jika ada
                    if ($kader->foto_profile) {
                        unlink(public_path('storage/profile/' . $kader->foto_profile));
                    }
    
                    $kader->foto_profile = $foto_profile;
                }
                $status = 'success';
                $message = 'Profil berhasil diperbarui';
                $data = $kader;
            } else {
                $status = 'failed';
                $message = 'profil tidak ditemukan';
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
