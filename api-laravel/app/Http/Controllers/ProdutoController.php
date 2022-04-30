<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    SearchProdutoRequest,
    StoreProdutoRequest,
    UpdateProdutoRequest
};

use App\Services\ProdutoService;

class ProdutoController extends Controller
{
    protected $service;

    public function __construct(ProdutoService $service)
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

    public function store(StoreProdutoRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(UpdateProdutoRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function search(SearchProdutoRequest $request)
    {
        return $this->service->search($request);
    }
}
