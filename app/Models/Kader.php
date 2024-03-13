<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kader';
    protected $fillable = [
        'nama',
        'no_hp',
        'usia',
        'wilayah_binaan',
        'foto_profile',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
