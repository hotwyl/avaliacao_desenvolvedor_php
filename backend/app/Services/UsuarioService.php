<?php

namespace App\Services;

use App\Models\Usuario;
use App\Repositorys\UsuarioRepository;
use Illuminate\Support\Str;

class UsuarioService
{

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if ($response = $this->repository->index()) {
            $response = formata_retorno('success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('error');
            return response()->json($response);
        }
    }

    public function show($id)
    {
        if ($response = $this->repository->show($id)) {
            $response = transforma_objeto($response);
            $response = formata_retorno('success', $response);
            return response()->json($response);
        } else {
            $response = formata_retorno('error');
            return response()->json($response);
        }
    }

    public function store($request)
    {
        $usuario = new Usuario();

        foreach ($request->all() as $key => $value) {
            if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                unset($usuario[$key]);
            } else {
                $usuario->$key = $value;
            }
        }

        if ($this->repository->store($usuario)) {
            $response = formata_retorno('success', $usuario);
            return response()->json($response);
        } else {
            $response = formata_retorno('error');
            return response()->json($response);
        }
    }

    // public function update($request, $id)
    // {
    //     $request->validate([
    //         'nome' => "required|min:5|max:100",
    //         'descricao' => "required|min:5|max:250",
    //         'preco' => "required|min:3",
    //         'categoria' => "required",
    //         'status' => "required"
    //     ]);

    //     $data = new Usuario();
    //     $data->id = $id;

    //     foreach ($request->all() as $key => $value) {
    //         if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
    //             unset($data[$key]);
    //         } else {
    //             if ($key == 'uuid') {
    //                 $data->$key = Str::uuid()->toString();
    //             } else {
    //                 $data->$key = $value;
    //             }
    //         }
    //     }

    //     if ($this->repository->update($data)) {
    //         return redirect()->route('produto.index');
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    // public function delete($id)
    // {

    //     if ($this->repository->delete($id)) {
    //         $dados['result'] = 'success';
    //         $dados['message'] = '';
    //         $dados['data'] = null;
    //         return response()->json($dados);
    //     } else {
    //         $dados['result'] = 'error';
    //         $dados['data'] = null;
    //         $dados['message'] = '';
    //         return response()->json($dados);
    //     }
    // }
}

function formata_retorno($resultado, $dados = null)
{
    switch ($resultado) {
        case 'success':
            $data['result'] = 'success';

            if (count($dados)<=0) {
                $data['message'] = 'Sem dados a retornar.';
            } else {
                $data['message'] = '';
            }
            $data['data'] = $dados;
            break;

        case 'error':
            $dados['result'] = 'error';
            $data['message'] = '';
            $data['data'] = $dados;
            break;
    }

    return $data;
}

function transforma_objeto($objeto)
{
    $dados[0]['id']=$objeto->id;
    $dados[0]['nome']=$objeto->nome;
    $dados[0]['email']=$objeto->email;
    $dados[0]['status']=$objeto->status;
    $dados[0]['created_at']=$objeto->created_at;
    $dados[0]['updated_at']=$objeto->updated_at;

    return  $dados;
}
