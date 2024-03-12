<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Models\Ahli;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AhliController extends Controller
{
    public function updateProfile(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $ahli = Ahli::where('user_id', $user->id_user)->first();
    
            if ($ahli) {
                $ahli->update([
                    'nama' => $request->nama,
                    'no_hp' => $request->no_hp,
                    'jenis_ahli' => $request->jenis_ahli,
                    'deskripsi_ahli' => $request->deskripsi_ahli,
                ]);
    
                // Cek apakah ada foto baru yang diunggah
                if ($request->hasFile('foto_profile')) {
                    $file = $request->file('foto_profile');
                    $foto_profile = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/profile/'), $foto_profile);
    
                    // Hapus foto lama jika ada
                    if ($ahli->foto_profile) {
                        unlink(public_path('storage/profile/' . $ahli->foto_profile));
                    }
    
                    $ahli->foto_profile = $foto_profile;
                }
                $status = 'success';
                $message = 'Profil berhasil diperbarui';
                $data = $ahli;
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
