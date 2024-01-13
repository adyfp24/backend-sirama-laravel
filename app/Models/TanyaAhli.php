<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanyaAhli extends Model
{
    use HasFactory;
    protected $fillable = ['topik_id', 'penanya_user_id','pertanyaan', 'waktu_tanya','status_pertanyaan'];
    protected $primaryKey = 'id_tanya_ahli';
    public function user(){
        return $this->belongsTo('users');
    }
}
