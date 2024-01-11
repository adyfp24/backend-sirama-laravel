<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavQuote extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','quote_id'];
    protected $primaryKey = 'id_fav_quotes';
    public function user(){
        return $this->belongsTo(FavQuote::class);
    }
    public function quote(){
        return $this->belongsTo(FavQuote::class);
    }
}
