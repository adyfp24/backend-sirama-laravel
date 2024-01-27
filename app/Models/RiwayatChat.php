<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatChat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_riwayat_chat';
    protected $fillable = ['pesan','user_id','tgl_chat','waktu_chat','room_chat_id'];
}
