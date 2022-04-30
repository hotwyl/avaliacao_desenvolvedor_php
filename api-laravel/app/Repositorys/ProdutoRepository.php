<?php

namespace App\Repositorys;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProdutoRepository
{
    protected $categoria;

    public function __construct(Produto $categoria)
    {
        $this->repository = $categoria;
    }

    public function index()
    {
        return  $this->repository->orderBy('descricao')->get();
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
        ->orWhere('descricao', 'LIKE' ,"%{$request->descricao}%")
        ->orWhere('status', 'LIKE' ,"%{$request->status}%")
        ->get();
    }
}
