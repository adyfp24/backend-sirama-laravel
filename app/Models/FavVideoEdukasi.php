<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavVideoEdukasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_fav_video_edukasi';
    protected $table = 'fav_video_edukasi';
    protected $fillable = ['user_id', 'video_edukasi_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function podcast(){
        return $this->belongsTo(VideoEdukasi::class);
    }
}
