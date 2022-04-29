<?php

namespace App\Repositorys;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UsuarioRepository
{
    protected $categoria;

    public function __construct(Usuario $categoria)
    {
        $this->repository = $categoria;
    }

    public function index()
    {
        return  $this->repository->orderBy('nome')->get();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function create()
    {
        return null;
    }

    public function store($request)
    {
        return $this->repository->create($request->toArray());
    }

    public function edit($id)
    {
        return $this->repository->find($id);
    }

    public function update($request)
    {
        $produto = $this->repository->find($request->id);

        if (!$produto) return false;

        $produto->fill($request->toArray());

        return $produto->update();
    }

    public function delete($id)
    {
        return $this->repository->find($id)->delete();
    }
}
