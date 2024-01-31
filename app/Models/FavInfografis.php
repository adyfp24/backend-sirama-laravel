<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavInfografis extends Model
{
    use HasFactory;
    protected $table = 'fav_infografis';
    protected $primaryKey = 'id_fav_infografis';
    protected $fillable = ['user_id', 'infografis_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function infografis(){
        return $this->belongsTo(Infografis::class);
    }
}
