<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavPodcast;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

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
    public function addPodcast(Request $request)
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
                'tgl_upload' => $request->tgl_upload,
                'upload_user_id' => $user->id_user
            ]);
            if ($newPodcast) {
                $message = 'podcast berhasil ditambah';
            }else{
                $message = 'podcast agal ditambah';
            }
            $status = 'success';
            $data = $newPodcast;
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
                $message = 'podcast berhasil di update';
            }else{
                $message = 'podcast gagal diupdate';
            }
            $status = 'success';
            $data = $updatedPodcast;
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
            } else {
                $message = 'podcast gagal dihapus';
            }
            $status = 'succes';
            $data = $deletedPodcast;
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
            $allFavPodcast = FavPodcast::all();
            if ($allFavPodcast) {
                $message = 'data podcast favorit tersedia';
            } else {
                $message = 'data podcast favorit tidak tersedia';
            }
            $status = 'success';
            $data = $allFavPodcast;
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
                $message = 'podcast berhasil ditambah ke favorit';
            } else {
                $message = 'podcast gagal ditambah ke favorit';
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
                $message = 'podcast berhasil dihapus dari favorit';
            } else {
                $message = 'podcast gagal dihapus dari favorit';
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
}
