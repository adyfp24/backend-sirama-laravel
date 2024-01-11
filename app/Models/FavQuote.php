<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavQuote extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','quotes_id'];
    public function user(){
        return $this->belongsTo(FavQuote::class);
    }
    public function quote(){
        return $this->belongsTo(FavQuote::class);
    }
}
