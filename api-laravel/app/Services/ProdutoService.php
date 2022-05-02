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
        try {
            $response = $this->repository->index();

            if (in_array($response, [null, false])) {
                $response = formata_retorno('index', 'error');
            } else {
                $response = formata_retorno('index', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('index', 'error', $ex->getMessage());
            return response()->json($response, 401);
        }
    }

    public function show($id)
    {
        try {
            $response = $this->repository->show($id);

            if (in_array($response, [null, false])) {
                $response = formata_retorno('show', 'error');
            } else {
                $response = transforma_objeto($response);
                $response = formata_retorno('show', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('show', 'error', $ex->getMessage());
            return response()->json($response, 401);
        }
    }

    public function store($request)
    {
        try {
            foreach ($request->all() as $key => $value) {
                if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                    unset($produto[$key]);
                } else {
                    $produto[$key] = $value;
                }
            }

            $response = $this->repository->store($produto);

            if (in_array($response, [null, false])) {
                $response = formata_retorno('show', 'error');
            } else {
                $response = transforma_objeto($response);
                $response = formata_retorno('store', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('store', 'error', $ex->getMessage());
            return response()->json($response, 401);
        }
    }

    public function update($request, $id)
    {
        try {
            $data['id'] = $id;

            foreach ($request->all() as $key => $value) {
                if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                    unset($data[$key]);
                } else {
                    $data[$key] = $value;
                }
            }

            $response = $this->repository->update($data);

            if (in_array($response, [null, false])) {
                $response = formata_retorno('update', 'error');
            } else {
                $response = formata_retorno('update', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('update', 'error', $ex->getMessage());
            return response()->json($response, 401);
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->repository->delete($id);
            if (in_array($response, [null, false])) {
                $response = formata_retorno('delete', 'error');
            } else {
                $response = formata_retorno('delete', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('delete', 'error', $ex->getMessage());
            return response()->json($response, 401);
        }
    }

    public function search($request)
    {
        try {
            foreach ($request->all() as $key => $value) {
                if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                    unset($data[$key]);
                } else {
                    $values[$key] = addslashes(trim(strip_tags($value)));
                }
            }

            $parametros['descricao'] = isset($values['descricao']) && !empty($values['descricao']) ? $values['descricao'] : '';
            $parametros['status'] = isset($values['status']) && !empty($values['status']) ? $values['status'] : '';

            $response = $this->repository->search((object)$parametros);

            if (in_array($response, [null, false])) {
                $response = formata_retorno('search', 'error');
            } else {
                $response = formata_retorno('search', 'success', $response);
            }

            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response = formata_retorno('search', 'error', $ex->getMessage());
            return response()->json($response, 401);
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
    $dados[0]['descricao'] = $objeto->descricao;
    $dados[0]['valor'] = $objeto->valor;
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

        case 'search':
            if ($registros == null || count($registros) <= 0) {
                $mensagem = 'Não foi encontrado dados para retornar.';
            } else {
                $mensagem = 'Segue dados encontrados.';
            }
            break;


        default:
            $mensagem = '';
            break;
    }

    return  $mensagem;
}
