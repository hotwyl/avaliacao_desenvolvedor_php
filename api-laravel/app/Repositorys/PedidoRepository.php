<?php

namespace App\Repositorys;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PedidoRepository
{
    protected $categoria;

    public function __construct(Pedido $pedido)
    {
        $this->repository = $pedido;
    }

    public function index()
    {
        return  $this->repository->orderBy('numero_ped')->paginate();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function store($produto)
    {
        return $this->repository->create($produto->toArray());
    }

    public function update($request)
    {
        $produto = $this->repository->find($request->id);

        if (!$produto) return false;

        $produto->fill($request->toArray());

        if($produto->update())
        return $this->repository->find($request->id);
    }

    public function delete($id)
    {
        $produto = $this->repository->find($id);

        if (!$produto) return false;

        return $this->repository->find($id)->delete();
    }

    public function search($request)
    {
        return $this->repository->query()
        ->orWhere('numero_ped', 'LIKE' ,"%{$request->numero_ped}%")
        ->orWhere('produto_id', 'LIKE' ,"%{$request->produto_id}%")
        ->orWhere('usuario_id', 'LIKE' ,"%{$request->usuario_id}%")
        ->orWhere('status', 'LIKE' ,"%{$request->status}%")
        ->paginate();
    }
}
