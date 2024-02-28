<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jangkauan_hasil_skrinning';
    protected $fillable = ['jangkauan_awal', 'jangkauan_akhir', 'hasil', 'jenis_hasil', 'bagian_skrinning_id'];
}
