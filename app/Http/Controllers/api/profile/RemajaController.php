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
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $remaja = Remaja::where('user_id', $user->id_user)->first();

            if ($remaja) {
                if ($request->hasFile('foto_profile')) {
                    $file = $request->file('foto_profile');
                    $foto_profile = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/profile/'), $foto_profile);
    
                    if ($remaja->foto_profile) {
                        unlink(public_path('storage/profile/' . $remaja->foto_profile));
                    }
                    $user->update([
                        'username' => $request->username,
                        'email' => $request->email
                    ]);
                    $remaja->update([
                        'nama' => $request->nama,
                        'no_hp' => $request->no_hp,
                        'tgl_lahir' => $request->tgl_lahir,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'sekolah' => $request->sekolah,
                        'foto_profile' => $foto_profile
                    ]);
                }else{
                    $user->update([
                        'username' => $request->username,
                        'email' => $request->email
                    ]);
                    $remaja->update([
                        'nama' => $request->nama,
                        'no_hp' => $request->no_hp,
                        'tgl_lahir' => $request->tgl_lahir,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'sekolah' => $request->sekolah,
                    ]);
                }
                $updatedProfile = Remaja::join('users', 'remajas.user_id', '=', 'users.id_user')
                    ->where('remajas.user_id', '=', $user->id_user)
                    ->select('remajas.*', 'users.*')
                    ->get();
                $status = 'success';
                $message = 'Profil berhasil diperbarui';
                $data = $updatedProfile;
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
