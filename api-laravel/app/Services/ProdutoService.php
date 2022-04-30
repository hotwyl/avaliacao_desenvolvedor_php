<?php

namespace App\Services;

use App\Models\Produto;
use App\Repositorys\ProdutoRepository;

class ProdutoService
{
    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if ($response = $this->repository->index()) {
            $response = formata_retorno('index', 'success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('index', 'error');
            return response()->json($response);
        }
    }

    public function show($id)
    {
        if ($response = $this->repository->show($id)) {
            $response = transforma_objeto($response);
            $response = formata_retorno('show', 'success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('show', 'error');
            return response()->json($response);
        }
    }

    public function store($request)
    {
        $produto = new Produto();

        foreach ($request->all() as $key => $value) {
            if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                unset($produto[$key]);
            } else {
                $produto->$key = $value;
            }
        }

        if ($response = $this->repository->store($produto)) {
            $response = formata_retorno('store', 'success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('store', 'error');
            return response()->json($response);
        }
    }

    public function update($request, $id)
    {
        $data = new Produto();
        $data->id = $id;

        foreach ($request->all() as $key => $value) {
            if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                unset($data[$key]);
            } else {
                $data->$key = $value;
            }
        }

        if ($response = $this->repository->update($data)) {
            $response = formata_retorno('update', 'success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('update', 'error');
            return response()->json($response);
        }
    }

    public function delete($id)
    {
        if ($response = $this->repository->delete($id)) {
            $response = formata_retorno('delete', 'success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('delete', 'error');
            return response()->json($response);
        }
    }
}

function formata_retorno($metodo, $resultado, $registros = null)
{
    switch ($resultado) {
        case 'success':
            $data['resultado'] = 'success';
            $data['messagem'] = retorna_mensagens($metodo, $registros);
            if (!($registros == null) || !($registros == false)) {
                $data['data'] = $registros;
            }
            break;

        case 'error':
            $data['resultado'] = 'error';
            $data['messagem'] = retorna_mensagens($metodo, $registros);
            if (!($registros == null) || !($registros == false)) {
                $data['data'] = $registros;
            }
            break;
    }

    return $data;
}

function transforma_objeto($objeto)
{
    $dados[0]['id'] = $objeto->id;
    $dados[0]['nome'] = $objeto->nome;
    $dados[0]['email'] = $objeto->email;
    $dados[0]['status'] = $objeto->status;
    $dados[0]['created_at'] = $objeto->created_at;
    $dados[0]['updated_at'] = $objeto->updated_at;

    return  $dados;
}

function retorna_mensagens($metodo, $registros)
{
    switch ($metodo) {
        case 'index':
            if (count($registros) <= 0) {
                $mensagem = 'Não foi encontrado dados para retornar.';
            } else {
                $mensagem = 'Segue dados encontrados.';
            }
            break;

        case 'show':
            if ($registros == null || count($registros) <= 0) {
                $mensagem = 'Não foi encontrado dados para retornar.';
            } else {
                $mensagem = 'Segue dados encontrados.';
            }
            break;

        case 'store':
            if (isset($registros) && !empty($registros)) {
                $mensagem = 'Registro salvo com sucesso.';
            } else {
                $mensagem = 'Não foi possivel salvar registro.';
            }
            break;

        case 'update':
            if (isset($registros) && !empty($registros)) {
                $mensagem = 'Registro salvo com sucesso.';
            } else {
                $mensagem = 'Não foi possivel salvar registro.';
            }
            break;

        case 'delete':
            if (isset($registros) && !empty($registros)) {
                $mensagem = 'Produto deletado com sucesso.';
            } else {
                $mensagem = 'Produto não pode ser deletado.';
            }
            break;

        default:
            $mensagem = '';
            break;
    }

    return  $mensagem;
}
