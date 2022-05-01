<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Models\Pedido;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'status',
        'token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pedidos() {
        return $this->hasMany(Pedido::class,'usuario_id','id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
