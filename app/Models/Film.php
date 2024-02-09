<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_film';
    protected $fillable = ['judul_film', 'link_film', 'deskripsi', 'tgl_upload', 'upload_user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fav_film(){
        return $this->hasMany(FavFilm::class);
    }

}
