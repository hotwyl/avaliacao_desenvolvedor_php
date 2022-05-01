<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    SearchUsuarioRequest,
    StoreUsuarioRequest,
    UpdateUsuarioRequest
};

use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $service;

    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function store(StoreUsuarioRequest $request)
    {

    }

    public function update(UpdateUsuarioRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function search(SearchUsuarioRequest $request)
    {
        return $this->service->search($request);
    }
}
