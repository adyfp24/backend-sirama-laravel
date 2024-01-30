<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Podcast;
use App\Models\VideoEdukasi;
use Illuminate\Http\Request;

class NewKontenController extends Controller
{
    public function getAllNewKonten()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $films = Film::orderByDesc('tgl_upload')->limit(2)->get();
            $podcasts = Podcast::orderByDesc('tgl_upload')->limit(2)->get();
            $videos = VideoEdukasi::orderByDesc('tgl_upload')->limit(2)->get();
            $result = [
                'podcast' => $podcasts,
                'film' => $films,
                'video' => $videos
            ];
            $message = 'data konten terbaru berhasil didapat';
            $status = 'success';
            $data = $result;
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
        // Mendapatkan 5 konten terbaru dari tabel Fil

    }
}
