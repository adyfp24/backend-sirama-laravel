<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TanyaAhli;
use Illuminate\Http\Request;

class TanyaAhliController extends Controller
{
    public function addPertanyaan(Request $request){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newQuestion = TanyaAhli::create([
                'topik_id' => $request->topik_id,
                'penanya_user_id' => $user->id_user,
                'pertanyaan' => $request->pertanyaan,
                'status_pertanyaan' => false,
                'waktu_tanya' => $request->waktu_tanya
            ]); 
            if ($newQuestion) {
                $message = 'pertanyaan berhasil ditambah';
            }else{
                $message = 'pertanyaan gagal ditambah';
            }
            $status = 'success';
            $data = $newQuestion;
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
    public function getAllPertanyaan(){

    }
    public function getPertanyaanById(){

    }
    public function deletePertanyaan(){

    }
}
