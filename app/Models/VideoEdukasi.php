<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoEdukasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_video_edukasi';
    protected $fillable = ['judul_video_edukasi', 'link_video_edukasi', 'tgl_upload', 'upload_user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fav_podcast(){
        return $this->hasMany(FavVideoEdukasi::class);
    }
}
