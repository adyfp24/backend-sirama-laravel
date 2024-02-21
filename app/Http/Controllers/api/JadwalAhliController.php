<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JadwalAhli;
use Illuminate\Http\Request;

class JadwalAhliController extends Controller
{
    public function getAllJadwal(){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allJadwal = JadwalAhli::all();
            if ($allJadwal) {
                $message = 'Data jadwal ahli tersedia.';
            } else {
                $message = 'Data jadwal ahli kosong.';
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
    public function getJadwalById($id){
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
    public function addJadwal(Request $request, $id){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newJadwal = JadwalAhli::create([
                'ahli_user_id' => $id,
                'hari' => $request->hari,
                'jam_konsultasi' => $request->jam_mulai,

            ]);
            if ($newJadwal) {
                $message = 'jadwal berhasil ditambah';
            }else{
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
    public function updateJadwal(Request $request, $id){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
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
            }else{
                $message = 'jadwal gagal diupdate';
            }
            $status = 'success';
            $data = $updatedJadwal;
        }catch (\Exception $e) {
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
    public function deleteJadwal($id){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $jadwal = JadwalAhli::find($id);
            $deletedJadwal = $jadwal->delete();
            if ($deletedJadwal) {
                $message = 'jadwal berhasil dihapus';
            } else {
                $message = 'jadwal gagal dihapus';
            }
            $status = 'succes';
            $data = $deletedJadwal;
        }catch (\Exception $e) {
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
