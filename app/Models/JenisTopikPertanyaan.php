<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTopikPertanyaan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_topik'];
    protected $primaryKey = 'id_jenis_topik_pertanyaan';
}
