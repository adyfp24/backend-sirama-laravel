<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sekolah';
    protected $fillable = ['nama_sekolah']; 
    public function user(){
        $this->belongsTo(User::class);
    }
}
