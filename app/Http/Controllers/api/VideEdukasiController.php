<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavVideoEdukasi;
use App\Models\VideoEdukasi;
use Illuminate\Http\Request;

class VideEdukasiController extends Controller
{
    public function getAllVideoEdukasi()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allVideoEdukasi = VideoEdukasi::all();
            if ($allVideoEdukasi) {
                $message = 'data video edukasi tersedia';
            } else {
                $message = 'data video edukasi tidak tersedia';
            }
            $status = 'success';
            $data = $allVideoEdukasi;
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

    public function getVideoEdukasiById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $video_edukasi = VideoEdukasi::where('id_video_edukasi', $id)->first();
            if ($video_edukasi) {
                $message = 'data video edukasi tersedia';
            } else {
                $message = 'data video edukasi tidak tersedia';
            }
            $status = 'success';
            $data = $video_edukasi;
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

    public function createVideoEdukasi(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $newVideoEdukasi = VideoEdukasi::create([
                'judul_video_edukasi' => $request->judul_video_edukasi,
                'link_video_edukasi' => $request->link_video_edukasi,
                'tgl_upload' => $request->tgl_upload,
                'upload_user_id' => $user->id_user
            ]);
            if ($newVideoEdukasi) {
                $status = 'success';
                $message = 'video edukasi berhasil di tambah';
                $data = $newVideoEdukasi;
            } else {
                $status = 'failed';
                $message = 'video edukasi gagal di tambah';
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

    public function updateVideoEdukasi(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $video_edukasi = VideoEdukasi::find($id);
            $updatedVideoEdukasi = $video_edukasi->update([
                'judul_video_edukasi' => $request->judul_video_edukasi,
                'link_video_edukasi' => $request->link_video_edukasi,
                'tgl_upload' => $request->tgl_upload,
                'upload_user_id' => $user->id_user
            ]);
            if ($updatedVideoEdukasi) {
                $status = 'success';
                $message = 'video edukasi berhasil di update';
                $data = $updatedVideoEdukasi;
            }else{
                $status = 'failed';
                $message = 'video edukasi gagal diupdate';
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

    public function deleteVideoEdukasi($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $video_edukasi = VideoEdukasi::find($id);
            $deletedVideoEdukasi = $video_edukasi->delete();
            if ($deletedVideoEdukasi) {
                $status = 'success';
                $message = 'video edukasi berhasil di hapus';
                $data = $deletedVideoEdukasi;
            }else{
                $status = 'failed';
                $message = 'video edukasi gagal dihapus';
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
    public function getAllFavVideoEdukasi()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $allFavVideoEdukasi = VideoEdukasi::where('user_id', $user->id_user)->get();
            if ($allFavVideoEdukasi) {
                $message = 'data video edukasi tersedia';
            } else {
                $message = 'data video edukasi tidak tersedia';
            }
            $status = 'success';
            $data = $allFavVideoEdukasi;
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

    public function addFavVideoEdukasi($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $favVideoEdukasi = FavVideoEdukasi::create([
                'video_edukasi_id' => $id,
                'user_id' => $user->id_user
            ]);
            if ($favVideoEdukasi) {
                $status = 'success';
                $message = 'video edukasi berhasil di tambah ke favorit';
                $data = $favVideoEdukasi;
            } else {
                $status = 'failed';
                $message = 'video edukasi gagal di tambah ke favorit';
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

    public function removeFavVideoEdukasi($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $video_edukasi = FavVideoEdukasi::find($id);
            $removedVideoEdukasi = $video_edukasi->delete();
            if ($removedVideoEdukasi) {
                $status = 'success';
                $message = 'video edukasi berhasil di hapus';
                $data = $removedVideoEdukasi;
            }else{
                $status = 'failed';
                $message = 'video edukasi gagal dihapus';
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
}
