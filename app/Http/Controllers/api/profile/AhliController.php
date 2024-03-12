<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AhliController extends Controller
{
    public function getProfile($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $detailProfile = DB::table('users')
                                ->join('ahlis', 'ahlis.user_id', '=', 'users.id_user')
                                ->where('id_user', $id)
                                ->first();
            $riwayatpend = DB::table('riwayatpend_ahlis')
                                ->join('users', 'riwayatpend_ahlis.ahli_user_id', '=', 'users.id_user')
                                ->join('ahlis', 'ahlis.user_id', '=', 'users.id_user')
                                ->select('id_riwayatpend_ahli', 'id_user', 'id_ahli', 'riwayat_pendidikan', 'nama')
                                ->where('ahli_user_id', $id)
                                ->get();

            $data = [
                "id_user" => $detailProfile->id_user,
                "username" => $detailProfile->username,
                "email" => $detailProfile->email,
                "role" => $detailProfile->role,
                "id_ahli" => $detailProfile->id_ahli,
                "nama" => $detailProfile->nama,
                "no_hp" => $detailProfile->no_hp,
                "jenis_ahli" => $detailProfile->jenis_ahli,
                "deskripsi_ahli" => $detailProfile->deskripsi_ahli,
                "foto_profile" => $detailProfile->foto_profile,
                "user_id" => $detailProfile->user_id,
                "detail_pendidikan_ahli" => $riwayatpend,
            ];
                                
            if (count($detailProfile) > 0 || count($riwayatpend) > 0){
                $message = 'data profile ahli tersedia';
            } else {
                $message = 'data profile ahli tidak tersedia';
            }
            $status = 'success';
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => [$data]
            ], $status_code);
        }
    }
}
