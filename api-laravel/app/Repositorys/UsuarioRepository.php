<?php

namespace App\Repositorys;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UsuarioRepository
{
    protected $categoria;

    public function __construct(User $usuario)
    {
        $this->repository = $usuario;
    }

    public function index()
    {
        return  $this->repository->orderBy('nome')->paginate();
    }

    public function show($id)
    {
        dd($this->repository->find($id));
        return $this->repository->find($id);
    }

    public function store($usuario)
    {
        return $this->repository->create($usuario->toArray());
    }

    public function update($request)
    {
        $usuario = $this->repository->find($request->id);

        if (!$usuario) return false;

        $usuario->fill($request->toArray());

        if($usuario->update())
        return $this->repository->find($request->id);
    }

    public function delete($id)
    {
        $usuario = $this->repository->find($id);

        if (!$usuario) return false;

        return $this->repository->find($id)->delete();
    }

    public function search($request)
    {
        return $this->repository->query()
        ->orWhere('nome', 'LIKE' ,"%{$request->nome}%")
        ->orWhere('email', 'LIKE' ,"%{$request->email}%")
        ->orWhere('status', 'LIKE' ,"%{$request->status}%")
        ->paginate();
    }
}
