<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function getAllQuote()
    {

    }
    public function getQuoteById()
    {

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
            $gambar_quote = $file->store('quote');
            $quote = Quote::create([
                'nama_quote' => $request->nama_quote,
                'gambar_quote' => $gambar_quote,
                'upload_user_id' => $user->id_user
            ]);
            if($quote){
                $message = 'data quote berhasil ditambah';
            }else{
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
    public function updateQuote()
    {

    }
    public function deleteQuote()
    {

    }
    public function addFavQuote()
    {

    }
    public function removeFavQuote()
    {

    }
}
