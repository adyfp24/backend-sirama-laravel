<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hasil_skrinning';
    protected $fillable = ['hasil', 'jenis_hasil', 'bagian_skrinning_id'];
}
