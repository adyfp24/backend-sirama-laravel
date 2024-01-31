<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavFilm;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function getAllFilm()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allFilm = Film::all();
            foreach ($allFilm as $film) {
                $film->total_likes = $this->getTotalLikes($film->id_film);
            }
            if ($allFilm) {
                $message = 'Data film tersedia.';
            } else {
                $message = 'Data film kosong.';
            }
            $status = 'success';
            $data = $allFilm;
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

    public function getFilmById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $film = Film::where('id_film', $id)->first();
            if ($film) {
                $message = 'Data film tersedia.';
            } else {
                $message = 'Data film kosong.';
            }
            $status = 'success';
            $data = $film;
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

    public function createFilm(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $film = Film::create([
                'judul_film' => $request->judul_film,
                'link_film' => $request->link_film,
                'tgl_upload' => $request->tgl_upload,
                'upload_user_id' => $user->id_user,
            ]);
            $status = 'success';
            $message = 'Data Film berhasil ditambah';
            $data = $film;
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

    public function updateFilm(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $film = Film::find($id);
            if ($film) {
                $updatedFilm = $film->update([
                    'judul_film' => $request->judul_film,
                    'link_film' => $request->link_film,
                    'tgl_upload' => $request->tgl_upload,
                    'upload_user_id' => $user->id_user,
                ]);
                if ($updatedFilm) {
                    $status = 'success';
                    $message = 'Data Film berhasil ditambah';
                    $data = $updatedFilm;
                } else {
                    $status = 'failed';
                    $message = 'Data Film gagal ditambah';
                    $status_code = 400;
                }
            } 
            else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data film tidak ditemukan.';
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

    public function deleteFilm($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $film = Film::find($id);
            if ($film) {
                $deletedFilm = $film->delete();
                if ($deletedFilm) {
                    $status = 'success';
                    $message = 'Data Film berhasil ditambah';
                } else {
                    $status = 'failed';
                    $message = 'Data Film gagal ditambah';
                    $status_code = 400;
                }
            } 
            else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data film tidak ditemukan.';
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

    public function getAllFavFilm()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $allFilm = FavFilm::where('user_id', $user->id_user)->get();
            if ($allFilm) {
                $message = 'Data film favorite tersedia.';
            } else {
                $message = 'Data film favorite kosong.';
            }
            $status = 'success';
            $data = $allFilm;
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

    public function addFavFilm($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $favFilm = FavFilm::create([
                'film_id' => $id,
                'user_id' => $user->id_user
            ]);
            if ($favFilm) {
                $status = 'success';
                $message = 'Data film berhasil ditambah ke favorite.';
            } else {
                $status_code = 400;
                $status = 'failed';
                $message = 'Data film gagal ditambah ke favorite.';
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

    public function removeFavFilm($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $favFilm = FavFilm::find($id);
            $removedFavFilm = $favFilm->delete();
            if ($removedFavFilm) {
                $status = 'success';
                $message = 'Data film berhasil dihapus dari favorite.';
            } else {
                $status_code = 400;
                $status = 'Failed';
                $message = 'Data film gagal dihapus dari favorite.';
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
    public function getTotalLikes($id){
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
}
