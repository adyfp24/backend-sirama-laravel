<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebaikan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kebaikan';
    protected $fillable = ['nama_kebaikan', 'minggu'];
}
