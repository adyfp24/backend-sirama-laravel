<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHasilSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hasil_skrinning';
    protected $fillable = ['jenis_hasil', 'hasil', 'tgl_pengisian', 'bag_skrin_user_id', 'user_id'];
}
