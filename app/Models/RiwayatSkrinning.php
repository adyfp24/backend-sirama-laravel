<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_riwayat_skrinning';
    protected $fillable = ['soal', 'jawaban', 'poin_jawaban', 'tgl_pengisian', 'bag_skrin_user_id'];
}
