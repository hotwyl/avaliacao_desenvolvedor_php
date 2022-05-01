<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_ped' => "required|numeric|unique:pedidos,numero_ped",
            'usuario_id' => "required|numeric",
            'produto_id' => "required|numeric",
            'status' => "required"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'messagem'   => 'Erro na Validação do formulário',
            'erros'      => $validator->errors()
        ]));
    }

    // public function messages()
    // {
    //     return [

    //     ];
    // }
}
