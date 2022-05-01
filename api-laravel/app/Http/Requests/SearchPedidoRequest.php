<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SearchPedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_ped' => "nullable|numeric",
            'usuario_id' => "nullable|numeric",
            'produto_id' => "nullable|numeric",
            'status' => "nullable"
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
