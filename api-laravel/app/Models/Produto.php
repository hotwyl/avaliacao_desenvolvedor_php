<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pedido;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'descricao',
        'valor',
        'status'
    ];

    public function pedidos() {
        return $this->hasMany(Pedido::class,'usuario_id','id');
    }
}
