<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomChatMe extends Model
{
    use HasFactory;
    protected $table ='room_chat_mes';
    protected $primaryKey = 'id_room_chat_me';
    protected $fillable = [ 'remaja_user_id','guru_user_id'];
}
