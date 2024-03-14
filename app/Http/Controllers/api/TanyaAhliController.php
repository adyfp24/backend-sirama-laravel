<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TanyaAhli;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TanyaAhliController extends Controller
{
    public function addPertanyaan(Request $request)
    {
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
                'waktu_tanya' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
            ]);
            if ($newQuestion) {
                $message = 'pertanyaan berhasil ditambah';
            } else {
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
    public function getAllPertanyaan()
    {

        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allQuestion = TanyaAhli::all();
            if ($allQuestion) {
                $allData = TanyaAhli::join('users', 'tanya_ahlis.penanya_user_id', '=', 'users.id_user')
                    ->join('remajas', 'users.id_user', '=', 'remajas.user_id') 
                    ->select('users.username', 'tanya_ahlis.*', 'remajas.nama', 'remajas.foto_profile')
                    ->get();
                $message = 'data pertanyaan tersedia';
            } else {
                $message = 'data pertanyaan tidak tersedia';
            }
            $status = 'success';
            $data = $allData;
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
    public function getPertanyaanById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $question = TanyaAhli::where('id_tanya_ahli', $id)->first();
            if ($question) {
                $message = 'data pertanyaan tersedia';
            } else {
                $message = 'data pertanyaan tidak tersedia';
            }
            $status = 'success';
            $data = $question;
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
    public function deletePertanyaan($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $question = TanyaAhli::find($id);
            $deletedQuestion = $question->delete();
            if ($deletedQuestion) {
                $message = 'pertanyaan berhasil dihapus';
            } else {
                $message = 'pertanyaan gagal dihapus';
            }
            $status = 'success';
            $data = $deletedQuestion;
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
