<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\User;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'numero_ped',
        'produto_id',
        'usuario_id',
        'status'
    ];

    public function produtos() {
        return $this->hasMany(Produto::class);
    }

    public function usuarios() {
        return $this->belongsTo(User::class);
    }
}
