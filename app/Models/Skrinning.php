<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_skrinning';
    protected $fillable = ['jenis_skrinning', 'deskripsi_skrinning'];
    public function bagian_skrinning(){
        return $this->hasMany(BagianSkrinning::class);
    }
    public function skrinning_user(){
        return $this->hasMany(SkrinningUser::class);
    }
}
