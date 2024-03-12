<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiawayatpendAhli extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_riwayatpend_ahli';
    protected $fillable = ['ahli_user_id', 'ruwayat_pendidikan'];
}
