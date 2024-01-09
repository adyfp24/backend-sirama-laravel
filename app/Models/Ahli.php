<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahli extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_hp',
        'jenis_ahli',
        'deskripsi_ahli',
        'foto_profile',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
