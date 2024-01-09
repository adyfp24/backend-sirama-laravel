<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class PodcastController extends Controller
{
    public function getAllPodcast(){
        $allPodcast = Podcast::all();
        if($allPodcast){
            return response()->json(['message' => 'data podcast tersedia', 'podcast' => $allPodcast],200);
        }else{
            return response()->json(['message' => 'data podcast tersedia', 'podcast' => $allPodcast],401);
        }
    }
    public function getPodcastById(){

    }
    public function addPodcast(Request $request){
        $user = auth()->user();
        $newPodcast = Podcast::create([
            'judul_podcast' => $request->judul_podcast,
            'link_podcast' => $request->link_podcast,
            'tgl_upload' => $request->tgl_upload,
            'upload_user_id' => $user->id_user
        ]);
        return response()->json(['message' => 'podcast berhasil dibuat', 'podcast' => $newPodcast], 200);
    }
    public function updatePodcast(){

    }
    public function deletePodcast(){

    }
    public function addFavPodcast(){

    }
    public function removeFavPodcast(){

    }
}
