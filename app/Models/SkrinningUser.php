<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkrinningUser extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_skrin_user';
    protected $fillable = ['tgl_pengisian', 'skrinning_id', 'user_id'];
}
