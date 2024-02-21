<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_soal_skrinning';
    protected $fillable = ['soal', 'no_soal', 'bagian_skrinning_id']; 
}
