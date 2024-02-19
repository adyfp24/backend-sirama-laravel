<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_infografis';
    protected $fillable = ['judul_infografis', 'deskripsi_infografis', 'tgl_upload', 'gambar_infografis', 'sampul_infografis','upload_user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fav_infografis(){
        return $this->hasMany(FavInfografis::class);
    }

}
