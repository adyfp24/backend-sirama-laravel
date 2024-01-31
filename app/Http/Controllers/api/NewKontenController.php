<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavFilm;
use App\Models\FavPodcast;
use App\Models\FavVideoEdukasi;
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
            foreach ($films as $film) {
                $film->total_likes = $this->getLikesFilm($film->id_film);
            }
            $podcasts = Podcast::orderByDesc('tgl_upload')->limit(2)->get();
            foreach ($podcasts as $podcast) {
                $podcast->total_likes = $this->getLikesPodcast($podcast->id_podcast);
            }
            $videos = VideoEdukasi::orderByDesc('tgl_upload')->limit(2)->get();
            foreach ($videos as $video) {
                $video->total_likes = $this->getLikesVideo($video->id_video_edukasi);
            }
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
            // $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            // $status_code = $e->getCode();
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
        // Mendapatkan 5 konten terbaru dari tabel Fil

    }
    private function getLikesFilm($id){
        try{
            $data = "";
            $film = FavFilm::where('film_id', $id);
            $totalLike = $film->count();
            if ($totalLike) {
                $data = $totalLike;
            }
        }catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } finally {
            return $data;
        }
    }
    private function getLikesPodcast($id){
        try{
            $data = "";
            $podcast = FavPodcast::where('podcast_id', $id);
            $totalLike = $podcast->count();
            if ($totalLike) {
                $data = $totalLike;
            }
        }catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } finally {
            return $data;
        }
    }
    public function getLikesVideo($id){
        try{
            $data = "";
            $video = FavVideoEdukasi::where('video_edukasi_id', $id);
            $totalLike = $video->count();
            if ($totalLike) {
                $data = $totalLike;
            }
        }catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } finally {
            return $data;
        }
    }
}
