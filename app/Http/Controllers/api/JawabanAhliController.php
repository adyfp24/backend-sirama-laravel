<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JawabanAhli;
use App\Models\TanyaAhli;
use Illuminate\Http\Request;

class JawabanAhliController extends Controller
{
    public function addJawaban(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newJawaban = JawabanAhli::create([
                'penjawab_user_id' => $user->id_user,
                'tanya_ahli_id' => $id,
                'jawaban_ahli' => $request->jawaban_ahli,
                'waktu_jawaban' => $request->waktu_jawaban
            ]);
            if ($newJawaban) {
                JawabanAhli::join('tanya_ahlis', 'jawaban_ahlis.tanya_ahli_id', '=', 'tanya_ahlis.id_tanya_ahli')
                    ->where('tanya_ahlis.status_pertanyaan', false)
                    ->update(['tanya_ahlis.status_pertanyaan' => true]);
                $message = 'jawaban berhasil ditambah';
            } else {
                $message = 'jawaban gagal ditambah';
            }
            $status = 'success';
            $data = $newJawaban;
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
    public function getAllJawaban()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allJawaban = JawabanAhli::join('tanya_ahlis', 'jawaban_ahlis.tanya_ahli_id', '=', 'tanya_ahlis.id_tanya_ahli')
                ->select('jawaban_ahlis.*', 'tanya_ahlis.pertanyaan', 'tanya_ahlis.penanya_user_id', 'tanya_ahlis.status_pertanyaan')
                ->get();
            if ($allJawaban) {
                $message = 'jawaban pertanyaan tersedia';
            } else {
                $message = 'jawaban pertanyaan tidak tersedia';
            }
            $status = 'success';
            $data = $allJawaban;
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
    public function getJawabanById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;

        try {
            $jawabanById = JawabanAhli::join('tanya_ahlis', 'jawaban_ahlis.tanya_ahli_id', '=', 'tanya_ahlis.id_tanya_ahli')
                ->select('jawaban_ahlis.*', 'tanya_ahlis.pertanyaan', 'tanya_ahlis.penanya_user_id', 'tanya_ahlis.status_pertanyaan')
                ->where('jawaban_ahlis.id_jawaban_ahli', $id)
                ->first();

            if ($jawabanById) {
                $message = 'Jawaban dengan ID ' . $id . ' ditemukan';
            } else {
                $message = 'Jawaban dengan ID ' . $id . ' tidak ditemukan';
            }

            $status = 'success';
            $data = $jawabanById;
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

    public function deleteJawaban($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $jawaban = JawabanAhli::find($id);
            $deletedJawaban = $jawaban->delete();
            if ($deletedJawaban) {
                $message = 'jawaban berhasil dihapus';
            } else {
                $message = 'jawaban gagal dihapus';
            }
            $status = 'success';
            $data = $deletedJawaban;
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
