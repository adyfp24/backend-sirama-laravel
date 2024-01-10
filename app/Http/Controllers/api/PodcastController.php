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
        $allPodcast = Podcast::all();
        if ($allPodcast) {
            return response()->json(['message' => 'data podcast tersedia', 'podcast' => $allPodcast], 200);
        } else {
            return response()->json(['message' => 'data podcast tidak tersedia', 'podcast' => $allPodcast], 404);
        }
    }
    public function getPodcastById($id)
    {
        $podcast = Podcast::where('id_podcast', $id)->first();
        if ($podcast) {
            return response()->json(['message' => 'data podcast tersedia', 'podcast' => $podcast], 200);
        } else {
            return response()->json(['message' => 'data podcast tidak tersedia'], 404);
        }
    }
    public function addPodcast(Request $request)
    {
        $user = auth()->user();
        $newPodcast = Podcast::create([
            'judul_podcast' => $request->judul_podcast,
            'link_podcast' => $request->link_podcast,
            'tgl_upload' => $request->tgl_upload,
            'upload_user_id' => $user->id_user
        ]);
        return response()->json(['message' => 'podcast berhasil dibuat', 'podcast' => $newPodcast], 200);
    }
    public function updatePodcast(Request $request, $id)
    {
        $user = auth()->user();
        $podcast = Podcast::find($id);
        $updatedPodcast = $podcast->update([
            'judul_podcast' => $request->judul_podcast,
            'link_podcast' => $request->link_podcast,
            'tgl_upload' => $request->tgl_upload,
            'upload_user_id' =>$user->id_user
        ]);
        if ($updatedPodcast) {
            return response()->json(['message' => 'podcast berhasil di update', 'updated podcast' => $podcast], 200);
        }
    }
    public function deletePodcast($id)
    {
        $podcast = Podcast::find($id);
        $deletedPodcast = $podcast->delete();
        if ($deletedPodcast) {
            return response()->json(['message' => 'podcast berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'podcast gagal dihapus'], 401);
        }
    }
    public function getAllFavPodcast(){
        $allFavPodcast = FavPodcast::all();
        if ($allFavPodcast) {
            return response()->json(['message' => 'data podcast favorit tersedia', 'podcast' => $allFavPodcast], 200);
        } else {
            return response()->json(['message' => 'data podcast favorit tidak tersedia', 'podcast' => $allFavPodcast], 404);
        }
    }
    public function addFavPodcast($id)
    {
        $user = auth()->user();
        $favPodcast = FavPodcast::create([
            'podcast_id' => $id,
            'user_id' => $user->id_user
        ]);
        if ($favPodcast) {
            return response()->json(['message' => 'podcast berhasil ditambah ke favorit', 'fav podcast' => $favPodcast], 200);
        }else{
            return response()->json(['message' => 'podcast gagal ditambah ke favorit'], 401);
        }
    }
    public function removeFavPodcast($id)
    {
        $user = auth()->user();
        $podcast = FavPodcast::find($id);
        $removedPodcast = $podcast->delete();
        if($removedPodcast){
            return response()->json(['message' => 'podcast berhasil dihapus dari favorit'], 200);
        }else{
            return response()->json(['message' => 'podcast gagal dihapus dari favorit'], 401);
        }
    }
}
