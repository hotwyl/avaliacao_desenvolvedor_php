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
        $response = $this->repository->index();

        if ($response) {
            $response = formata($response);
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = $response;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }

    public function show($id)
    {
        $response = $this->repository->show($id);

        if ($response) {
            $response = formata($response);
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = $response;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }

    public function create()
    {
        $response = $this->repository->create();
        return view('produto.adicionar');
    }

    public function store($request)
    {
        $request->validate([
            'nome' => "required|min:5|max:100|unique:ajustes_produtos,nome",
            'descricao' => "required|min:5|max:250",
            'preco' => "required|min:3",
            'categoria' => "required",
            'status' => "required"
        ]);

        $data = new Usuario();

        foreach ($request->all() as $key => $value) {
            if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                unset($data[$key]);
            } else {
                if ($key == 'uuid') {
                    $data->$key = Str::uuid()->toString();
                } else {
                    $data->$key = $value;
                }
            }
        }

        if ($this->repository->store($data)) {
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = null;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }

    public function edit($id)
    {
        $response = $this->repository->edit($id);

        if ($response) {
            $response = formata($response);
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = $response;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }

    public function update($request, $id)
    {
        $request->validate([
            'nome' => "required|min:5|max:100",
            'descricao' => "required|min:5|max:250",
            'preco' => "required|min:3",
            'categoria' => "required",
            'status' => "required"
        ]);

        $data = new Usuario();
        $data->id = $id;

        foreach ($request->all() as $key => $value) {
            if (!$value || empty($value) || $key == '_token' || $value == null || $value == false) {
                unset($data[$key]);
            } else {
                if ($key == 'uuid') {
                    $data->$key = Str::uuid()->toString();
                } else {
                    $data->$key = $value;
                }
            }
        }

        if ($this->repository->update($data)) {
            return redirect()->route('produto.index');
        } else {
            return redirect()->back();
        }
    }

    public function del($id)
    {
        $response = $this->repository->del($id);

        if ($response) {
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = null;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }


    public function delete($id)
    {

        if ($this->repository->delete($id)) {
            $dados['result'] = 'success';
            $dados['message'] = '';
            $dados['data'] = null;
            return response()->json($dados);
        } else {
            $dados['result'] = 'error';
            $dados['data'] = null;
            $dados['message'] = '';
            return response()->json($dados);
        }
    }
}

function formata($response)
{
    return $response;
}
