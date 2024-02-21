<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavInfografis;
use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Str;

class InfografisController extends Controller
{
    public function getAllInfografis()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allInfografis = Infografis::all();
            foreach ($allInfografis as $infografis) {
                $infografis->total_likes = $this->getTotalLikes($infografis->id_infografis);
            }
            if ($allInfografis) {
                $message = 'Data infografis tersedia.';
            } else {
                $message = 'Data infografis tidak tersedia.';
            }
            $status = 'success';
            $data = $allInfografis;
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
    public function getInfografisById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $infografis = Infografis::where('id_infografis', $id)->first();
            if ($infografis) {
                $message = 'Data infografis tersedia.';
            } else {
                $message = 'Data infografis tidak tersedia.';
            }
            $status = 'success';
            $data = $infografis;
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
    public function createInfografis(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $fileInfografis = $request->file('gambar_infografis');
            $fileSampul = $request->file('sampul_infografis');
            $gambar_infografis = Str::random() . '.' . $fileInfografis->getClientOriginalExtension();
            $sampul_infografis = Str::random() . '.' . $fileInfografis->getClientOriginalExtension();
            $fileInfografis->move(public_path('storage/infografis/'), $gambar_infografis);
            $fileSampul->move(public_path('storage/infografis/'), $sampul_infografis);
            $infografis = Infografis::create([
                'judul_infografis' => $request->judul_infografis,
                'deskripsi_infografis' => $request->deskripsi_infografis,
                'tgl_upload' => Carbon::now()->format('Y-m-d'),
                'gambar_infografis' => $gambar_infografis,
                'sampul_infografis' => $sampul_infografis,
                'upload_user_id' => $user->id_user
            ]);
            $status = 'success';
            $message = 'Data infografis berhasil ditambah.';
            $data = $infografis;
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }

    }

    public function updateInfografis(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $infografis = Infografis::find($id);
            if ($infografis) {
                $file = $request->file('gambar_infografis');
                if ($file) {
                    unlink(public_path('storage/infografis/' . $infografis->gambar_infografis));
                    $gambar_infografis = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/infografis/'), $gambar_infografis);
                    $updatedInfografis = $infografis->update([
                        'judul_infografis' => $request->judul_infografis,
                        'deskripsi_infografis' => $request->deskripsi_infografis,
                        'tgl_upload' => Carbon::now()->format('Y-m-d'),
                        'gambar_infografis' => $gambar_infografis,
                        'upload_user_id' => $user->id_user
                    ]);
                    if ($updatedInfografis) {
                        $status = 'success';
                        $message = 'Data infografis berhasil diubah.';
                        $data = $updatedInfografis;
                    } else {
                        $status = 'failed';
                        $message = 'Data infografis gagal diubah.';
                        $status_code = 400;
                    }
                } else {
                    $updatedInfografis = $infografis->update([
                        'judul_infografis' => $request->judul_infografis,
                        'deskripsi_infografis' => $request->deskripsi_infografis,
                        'tgl_upload' => $request->tgl_upload,
                        'upload_user_id' => $user->id_user
                    ]);
                    if ($updatedInfografis) {
                        $status = 'success';
                        $message = 'Data infografis berhasil diubah.';
                        $data = $updatedInfografis;
                    } else {
                        $status = 'failed';
                        $message = 'Data infografis gagal diubah.';
                        $status_code = 400;
                    }
                }
            } else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data infografis tidak ditemukan.';
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
    public function deleteInfografis($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $infografis = Infografis::find($id);
            if ($infografis) {
                unlink(public_path('storage/infografis/' . $infografis->gambar_infografis));
                unlink(public_path('storage/infografis/' . $infografis->sampul_infografis));
                $deletedInfografis = $infografis->delete();
                if ($deletedInfografis) {
                    $status = 'success';
                    $message = 'Data infografis berhasil dihapus.';
                } else {
                    $status = 'failed';
                    $message = 'Data infografis gagal dihapus.';
                    $status_code = 400;
                }
            } else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data infografis tidak ditemukan.';
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
    public function getAllFavInfografis()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $allInfografis = FavInfografis::join('infografis', 'fav_infografis.infografis_id', '=', 'infografis.id_infografis')
                ->where('user_id', '=', $user->id_user)
                ->select('fav_infografis.*', 'infografis.*')
                ->get();
            if ($allInfografis) {
                
                $message = 'Data infografis favorit tersedia';
                $status = 'success';
                $data = $allInfografis;
            } else {
                $message = 'Data infografis favorit tidak tersedia';
                $status = 'error';
                $data = [];
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
    public function addFavInfografis($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $favInfografis = FavInfografis::create([
                'infografis_id' => $id,
                'user_id' => $user->id_user
            ]);
            if ($favInfografis) {
                $status = 'success';
                $message = 'Data infografis berhasil ditambah ke favorite.';
                $data = $favInfografis;
            } else {
                $status_code = 400;
                $status = 'failed';
                $message = 'Data infografis gagal ditambah ke favorite.';
            }
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            // $status_code = $e->getCode();
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
    public function removeFavInfografis($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $favInfografis = FavInfografis::find($id);
            $removedFavInfografis = $favInfografis->delete();
            if ($removedFavInfografis) {
                $status = 'success';
                $message = 'Data infografis berhasil dihapus dari favorite.';
                $data = $removedFavInfografis;
            } else {
                $status_code = 400;
                $status = 'Failed';
                $message = 'Data infografis gagal dihapus dari favorite.';
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
    public function getTotalLikes($id)
    {
        try {
            $data = "";
            $infografis = FavInfografis::where('infografis_id', $id);
            $totalLike = $infografis->count();
            if ($totalLike) {
                $data = $totalLike;
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
            return $data;
        }
    }
}
