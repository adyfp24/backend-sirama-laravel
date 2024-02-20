<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavPodcast extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_fav_podcast';
    protected $fillable = ['user_id','podcast_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function podcast(){
        return $this->belongsTo(Podcast::class);
    }
}
