<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanAhli extends Model
{
    use HasFactory;
    protected $fillable = ['penjawab_user_id','tanya_ahli_id','jawaban_ahli','waktu_jawaban'];
    protected $primaryKey = 'id_jawaban_ahli';
}
