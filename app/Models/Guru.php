<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'nama',
        'no_hp',
        'jenis_guru',
        'sekolah',
        'foto_profile',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
