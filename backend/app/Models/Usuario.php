<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'descricao',
        'email',
        'status'
    ];

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'id_project' , 'id' );
    }
}
