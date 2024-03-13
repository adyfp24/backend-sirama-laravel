<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_orangtua';
    protected $fillable = [
        'nama',
        'no_hp',
        'tingkat_sekolah_anak',
        'foto_profile',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
