<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'nome' => "required|min:5|max:100|unique:usuarios,nome",
            'descricao' => "required|min:5|max:250",
            'email' => "required|email|min:3",
            'status' => "boolean"
        ];
    }
}
