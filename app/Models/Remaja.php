<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remaja extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_remaja';
    protected $fillable = [
        'nama',
        'no_hp',
        'tgl_lahir',
        'jenis_kelamin',
        'sekolah',
        'foto_profile',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
