<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JadwalAhli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalAhliController extends Controller
{
    public function getAllJadwal()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allJadwal = JadwalAhli::join('ahlis', 'jadwal_ahlis.ahli_user_id', '=', 'ahlis.user_id')
                ->select('jadwal_ahlis.id_jadwal_ahli','jadwal_ahlis.ahli_user_id', 'jadwal_ahlis.hari','jadwal_ahlis.jam_mulai','jadwal_ahlis.jam_berakhir', 'ahlis.*')
                ->get();

            foreach ($allJadwal as $jadwal) {
                // Ambil riwayat pendidikan untuk setiap ahli
                $riwayatpend = DB::table('riwayatpend_ahlis')
                    ->join('users', 'riwayatpend_ahlis.ahli_user_id', '=', 'users.id_user')
                    ->join('ahlis', 'ahlis.user_id', '=', 'users.id_user')
                    ->select('id_riwayatpend_ahli', 'riwayat_pendidikan')
                    ->where('riwayatpend_ahlis.ahli_user_id', '=', $jadwal->ahli_user_id)
                    ->get();

                // Tambahkan data riwayat pendidikan ke objek jadwal saat ini
                $jadwal->detail_pendidikan_ahli = $riwayatpend;
            }

            if ($allJadwal->isEmpty()) {
                $message = 'Data jadwal ahli kosong.';
            } else {
                $message = 'Data jadwal ahli tersedia.';
            }
            $status = 'success';
            $data = $allJadwal;
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
                'data' => $data
            ], $status_code);
        }
    }
    public function getJadwalById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $jadwal = JadwalAhli::find($id);
            if ($jadwal) {
                $message = 'Data jadwal ahli tersedia.';
            } else {
                $message = 'Data jadwal ahli kosong.';
            }
            $status = 'success';
            $data = $jadwal;
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
                'data' => $data
            ], $status_code);
        }
    }
    public function addJadwal(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newJadwal = JadwalAhli::create([
                'ahli_user_id' => $id,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_berakhir' => $request->jam_berakhir,
            ]);
            if ($newJadwal) {
                $message = 'jadwal berhasil ditambah';
            } else {
                $message = 'jadwal gagal ditambah';
            }
            $status = 'success';
            $data = $newJadwal;
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
                'data' => $data
            ], $status_code);
        }
    }
    public function updateJadwal(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $jadwal = JadwalAhli::find($id);
            $updatedJadwal = $jadwal->update([
                'ahli_user_id' => $user->id_user,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_berakhir' => $request->jam_berakhir
            ]);
            if ($updatedJadwal) {
                $message = 'jadwal berhasil di update';
            } else {
                $message = 'jadwal gagal diupdate';
            }
            $status = 'success';
            $data = $updatedJadwal;
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
                'data' => $data
            ], $status_code);
        }
    }
    public function deleteJadwal($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $jadwal = JadwalAhli::find($id);
            $deletedJadwal = $jadwal->delete();
            if ($deletedJadwal) {
                $message = 'jadwal berhasil dihapus';
            } else {
                $message = 'jadwal gagal dihapus';
            }
            $status = 'succes';
            $data = $deletedJadwal;
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
                'data' => $data
            ], $status_code);
        }
    }
}
