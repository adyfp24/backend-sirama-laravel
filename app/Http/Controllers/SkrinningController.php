<?php

namespace App\Http\Controllers;

use App\Models\Skrinning;
use App\Models\SkrinningUser;
use Illuminate\Http\Request;

class SkrinningController extends Controller
{
    public function allSkrinning()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allSkrinning = Skrinning::all();
            if (count($allSkrinning) > 0) {
                $message = 'data jenis skrinning tersedia';
            } else {
                $message = 'data jenis skrinning tidak tersedia';
            }
            $status = 'success';
            $data = $allSkrinning;
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

    public function addSkrinning(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $addSkrinning = Skrinning::create([
                'jenis_skrinning' => $request->jenis_skrinning,
                'deskripsi_skrinning' => $request->deskripsi_skrinning
            ]);
            if ($addSkrinning) {
                $status = 'success';
                $message = 'Data skrining berhasil ditambah.';
            } else {
                $status_code = 400;
                $status = 'failed';
                $message = 'Data skrining gagal ditambah.';
            }
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

    public function getBagianSkrinnning($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allPodcast = Skrinning::all();
            if ($allPodcast) {
                $message = 'data podcast tersedia';
            } else {
                $message = 'data podcast tidak tersedia';
            }
            $status = 'success';
            $data = $allPodcast;
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

    public function addSkrinningUser($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newSkrinningUser = SkrinningUser::create([
                'tgl_pengisian' => date('Y-m-d'),
                'skrinning_id' => $id,
                'user_id' => $user->id_user
            ]);
            if ($newSkrinningUser) {
                $message = 'Skrining user berhasil ditambah';
                $status = 'success';
                $data = $newSkrinningUser;
            }else{
                $message = 'Skrining user gagal ditambah';
                $status = 'failed';
                $status_code = 400;            
            } 
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

    public function addBagianSkrinningUser(Request $request)
    {

    }

    public function addRiwayatSkrinning(Request $request)
    {

    }

    public function getHasilSkrinning($id)
    {

    }

    public function addRiwayatHasilSkrinning(Request $request)
    {

    }

    public function getRiwayatSkrinningUser()
    {
        
    }

    public function getDetailRiwayatSkrinning($id)
    {

    }
    
}
