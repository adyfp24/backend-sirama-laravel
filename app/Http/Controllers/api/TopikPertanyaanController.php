<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JenisTopikPertanyaan;
use Illuminate\Http\Request;

class TopikPertanyaanController extends Controller
{
    public function addTopik(Request $request){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $topik = JenisTopikPertanyaan::create([
                'nama_topik' => $request->nama_topik,
            ]);
            if ($topik) {
                $message = 'topik pertanyaan berhasil ditambah';
            } else {
                $message = 'topik pertanyaan gagal ditambah';
            }
            $status = 'success';
            $data = $topik;
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
    public function getallTopik(){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allTopik = JenisTopikPertanyaan::all();
            if ($allTopik) {
                $message = 'data topik pertanyaan tersedia';
            } else {
                $message = 'data topik pertanyaan tidak tersedia';
            }
            $status = 'success';
            $data = $allTopik;
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
    public function getTopikById($id){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $topik = JenisTopikPertanyaan::where('id_jenis_topik_pertanyaan', $id)->first();
            if ($topik) {
                $message = 'data topik pertanyaan tersedia';
            } else {
                $message = 'data topik pertanyaan tidak tersedia';
            }
            $status = 'success';
            $data = $topik;
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
    public function deleteTopik($id){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $topik = JenisTopikPertanyaan::find($id);
            $deletedTopik = $topik->delete();
            if ($deletedTopik) {
                $message = 'topik pertanyaan berhasil dihapus';
            } else {
                $message = 'topik pertanyaan gagal dihapus';
            }
            $status = 'success';
            $data = $deletedTopik;
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
