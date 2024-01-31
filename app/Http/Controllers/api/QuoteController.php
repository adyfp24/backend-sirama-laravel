<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FavQuote;
use App\Models\Quote;
use Illuminate\Http\Request;
use Str;

class QuoteController extends Controller
{
    public function getAllQuote()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $allQuote = Quote::all();
            foreach ($allQuote as $quote) {
                $quote->total_likes = $this->getTotalLikes($quote->id_quote);
            }

            if ($allQuote) {
                $message = 'Data quote tersedia.';
            } else {
                $message = 'Data quote kosong.';
            }
            $status = 'success';
            $data = $allQuote;
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
    public function getQuoteById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $quote = Quote::where('id_quote', $id)->first();
            if ($quote) {
                $message = 'data quote tersedia';
            } else {
                $message = 'data quote tidak tersedia';
            }
            $status = 'success';
            $data = $quote;
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
    public function createQuote(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $file = $request->file('gambar_quote');
            $gambar_quote = Str::random() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/quote/'), $gambar_quote);
            $quote = Quote::create([
                'nama_quote' => $request->nama_quote,
                'gambar_quote' => $gambar_quote,
                'upload_user_id' => $user->id_user
            ]);
            if ($quote) {
                $message = 'data quote berhasil ditambah';
            } else {
                $message = 'data quote gagal ditambah';
            }
            $status = 'success';
            $data = $quote;
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
    public function updateQuote(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 201;
        try {
            $user = auth()->user();
            $quote = Quote::find($id);
            if ($quote) {
                $file = $request->file('gambar_quote');
                if ($file) {
                    unlink(public_path('storage/quote/' . $quote->gambar_quote));
                    $gambar_quote = Str::random() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/quote/'), $gambar_quote);
                    $updatedQuote = $quote->update([
                        'nama_quote' => $request->nama_quote,
                        'gambar_quote' => $gambar_quote,
                        'upload_user_id' => $user->id_user
                    ]);
                    if ($updatedQuote) {
                        $status = 'success';
                        $message = 'Data Quote berhasil diubah.';
                        $data = $updatedQuote;
                    } else {
                        $status = 'failed';
                        $message = 'Data Quote gagal diubah.';
                        $status_code = 400;
                    }
                } else {
                    $updatedQuote = $quote->update([
                        'nama_quote' => $request->nama_quote,
                        'upload_user_id' => $user->id_user
                    ]);
                    if ($updatedQuote) {
                        $status = 'success';
                        $message = 'Data Quote berhasil diubah.';
                        $data = $updatedQuote;
                    } else {
                        $status = 'failed';
                        $message = 'Data Quote gagal diubah.';
                        $status_code = 400;
                    }
                }
            } else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data Quote tidak ditemukan.';
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
    public function deleteQuote($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $quote = Quote::find($id);
            if ($quote) {
                $file = $quote->gambar_quote;
                if ($file) {
                    unlink(public_path('storage/quote/' . $quote->gambar_quote));
                }
                $deletedQuote = $quote->delete();
                if ($deletedQuote) {
                    $status = 'success';
                    $message = 'Data quote berhasil dihapus.';
                } else {
                    $status = 'failed';
                    $message = 'Data quote gagal dihapus.';
                    $status_code = 400;
                }
            } else {
                $status = 'failed';
                $status_code = 404;
                $message = 'Data quote tidak ditemukan.';
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
    public function getAllFavQuote()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $allQuote = FavQuote::where('user_id', $user->id_user)->get();
            if ($allQuote) {
                $message = 'Data favorite Quote tersedia.';
            } else {
                $message = 'Data favorite Quote tidak tersedia.';
            }
            $status = 'success';
            $data = $allQuote;
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
    public function addFavQuote(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $favQuote = FavQuote::create([
                'quote_id' => $id,
                'user_id' => $user->id_user,
            ]);
            
            if ($favQuote) {
                $message = 'quote berhasil ditambah ke favorit';
            } else {
                $message = 'quote gagal ditambah ke favorit';
            }
            $status = 'success';
            $data = $favQuote;
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
    public function removeFavQuote($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $favQuote = FavQuote::find($id);
            $removedFavQuote = $favQuote->delete();
            if ($removedFavQuote) {
                $status = 'success';
                $message = 'Data Quote berhasil dihapus dari favorite.';
            } else {
                $status_code = 400;
                $status = 'Failed';
                $message = 'Data Quote gagal dihapus dari favorite.';
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
            $quote = FavQuote::where('quote_id', $id);
            $totalLike = $quote->count();
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
