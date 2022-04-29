<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'numero_pedido',
        'fk_produto_id',
        'fk_usuario_id'
    ];

    public function produtos() {
        return $this->hasMany(Produto::class, 'fk_produto_id' , 'id' );
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'fk_usuario_id' , 'id' );
    }
}
