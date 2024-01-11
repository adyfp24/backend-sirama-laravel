<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAhli extends Model
{
    use HasFactory;
    protected $fillable = ['ahli_user_id', 'hari', 'jam_mulai', 'jam_berakhir'];
    protected $primaryKey = 'id_jadwal_ahli';
}
