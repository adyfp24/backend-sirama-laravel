<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jawaban_skrinning';
    protected $fillable = ['jawaban', 'poin_jawaban', 'soal_skrinning_id'];
}
