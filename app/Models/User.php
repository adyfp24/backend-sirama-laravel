<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function kader(){
        return $this->hasMany(Kader::class);
    }
    public function ahli(){
        return $this->hasMany(Ahli::class);
    }
    public function guru(){
        return $this->hasMany(Guru::class);
    }
    public function orangtua(){
        return $this->hasMany(Orangtua::class);
    }
    public function remaja(){
        return $this->hasMany(Remaja::class);
    }
    public function podcast(){
        return $this->hasMany(Podcast::class);
    }
    public function fav_podcast(){
        return $this->hasMany(FavPodcast::class);
    }
    public function infografis(){
        return $this->hasMany(Infografis::class);
    }
    public function fav_infografis(){
        return $this->hasMany(FavInfografis::class);
    }
    public function tanyaAhli(){
        return $this->hasMany(TanyaAhli::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $primaryKey='id_user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
