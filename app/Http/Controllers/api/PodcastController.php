<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavPodcast;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class PodcastController extends Controller
{
    public function getAllPodcast()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allPodcast = Podcast::all();
            foreach ($allPodcast as $podcast) {
                $podcast->total_likes = $this->getTotalLikes($podcast->id_podcast);
            }

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
    public function getPodcastById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $podcast = Podcast::where('id_podcast', $id)->first();
            if ($podcast) {
                $message = 'data podcast tersedia';
            } else {
                $message = 'data podcast tidak tersedia';
            }
            $status = 'success';
            $data = $podcast;
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
    public function createPodcast(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newPodcast = Podcast::create([
                'judul_podcast' => $request->judul_podcast,
                'link_podcast' => $request->link_podcast,
                'tgl_upload' => Carbon::now()->format('Y-m-d'),
                'upload_user_id' => $user->id_user
            ]);
            if ($newPodcast) {
                $message = 'podcast berhasil ditambah';
                $status = 'success';
                $data = $newPodcast;
            }else{
                $message = 'podcast gagal ditambah';
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
    public function updatePodcast(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $user = auth()->user();
            $podcast = Podcast::find($id);
            $updatedPodcast = $podcast->update([
                'judul_podcast' => $request->judul_podcast,
                'link_podcast' => $request->link_podcast,
                'tgl_upload' => $request->tgl_upload,
                'upload_user_id' => $user->id_user
            ]);
            if ($updatedPodcast) {
                $status = 'success';
                $data = $updatedPodcast;
                $message = 'podcast berhasil di update';
            }else{
                $status = 'failed';
                $message = 'podcast gagal diupdate';
                $status_code = 400;
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
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }
    public function deletePodcast($id)
    {   
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $podcast = Podcast::find($id);
            $deletedPodcast = $podcast->delete();
            if ($deletedPodcast) {
                $message = 'podcast berhasil dihapus';
                $status = 'succes';
                $data = $deletedPodcast;
            } else {
                $message = 'podcast gagal dihapus';
                $status = 'failed';
                $status_code = 400;
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
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }
    public function getAllFavPodcast()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $user = auth()->user();
            $allFavPodcast = FavPodcast::join('podcasts', 'fav_podcasts.podcast_id', '=', 'podcasts.id_podcast')
            ->where('user_id', '=', $user->id_user)
            ->select('fav_podcasts.*','podcasts.*')
            ->get();
            if ($allFavPodcast->isEmpty()) {
                $message = 'Data podcast favorit tidak tersedia';
                $status = 'error';
                $data = [];
            } else {
                $message = 'Data podcast favorit tersedia';
                $status = 'success';
                $data = $allFavPodcast;
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
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }
    
    public function addFavPodcast($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $user = auth()->user();
            $favPodcast = FavPodcast::create([
                'podcast_id' => $id,
                'user_id' => $user->id_user
            ]);
            if ($favPodcast) {
                $status = 'success';
                $message = 'podcast berhasil ditambah ke favorit';
                $data = $favPodcast;
            } else {
                $message = 'podcast gagal ditambah ke favorit';
                $status = 'failed';
                $status_code = 400;
            }
            $status = 'success';
            $data = $favPodcast;
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
    public function removeFavPodcast($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $podcast = FavPodcast::find($id);
            $removedPodcast = $podcast->delete();
            if ($removedPodcast) {
                $status = 'success';
                $message = 'podcast berhasil dihapus dari favorit';
                $data = $removedPodcast;
            } else {
                $status = 'failed';
                $message = 'podcast gagal dihapus dari favorit';
                $status_code = 400;
            }
            $status = 'success';
            $data = $removedPodcast;
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
    public function getTotalLikes($id){
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
}
  