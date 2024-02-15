<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianSkrinningUser extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bag_skrin_user';
    protected $fillable = ['skrin_user_id', 'bagian_skrinning_id'];
}
