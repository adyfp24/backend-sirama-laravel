<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianSkrinning extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bagian_skrinning';
    protected $fillable = ['nama_bagian', 'urutan_bagian', 'skrinning_id'];
    public function skrinning(){
        return $this->belongsTo('skrinnings');
    }
}
