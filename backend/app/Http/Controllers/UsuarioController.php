<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Services\UsuarioService;
use GuzzleHttp\Psr7\Request;

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
        return $this->service->store($request);
    }

    // public function update(Request $request, $id)
    // {
    //     return $this->service->update($request, $id);
    // }

    // public function delete($id)
    // {
    //     return $this->service->delete($id);
    // }
}
