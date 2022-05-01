<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    SearchPedidoRequest,
    StorePedidoRequest,
    UpdatePedidoRequest
};

use App\Services\PedidoService;

class PedidoController extends Controller
{
    protected $service;

    public function __construct(PedidoService $service)
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

    public function store(StorePedidoRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(UpdatePedidoRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function search(SearchPedidoRequest $request)
    {
        return $this->service->search($request);
    }
}
