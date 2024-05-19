<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKebaikan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detail_kebaikan';
    protected $fillable = ['kebaikan_id', 'user_id'];
}
