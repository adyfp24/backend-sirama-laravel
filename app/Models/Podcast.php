<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_podcast';
    protected $fillable = ['judul_podcast','link_podcast','deskripsi','tgl_upload','upload_user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fav_podcast(){
        return $this->hasMany(FavPodcast::class);
    }
}
