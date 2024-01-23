<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getFile($path){
        $imagePath = $path;
        if (!Storage::exists($imagePath)) {
            return response()->json(['message' => 'Gambar tidak ditemukan.'], 404);
        }

        return response()->download(storage_path("app/".$imagePath));
    }
}
