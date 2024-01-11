<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = ['nama_quote', 'gambar_quote'];
    public function fav_quote(){
        return $this->hasMany(FavQuote::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
