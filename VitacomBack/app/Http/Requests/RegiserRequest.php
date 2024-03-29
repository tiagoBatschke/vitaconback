<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegiserRequest extends FormRequest
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
            'name' => 'required|max:55',
            'email' => 'required|unique:users|min:5|max:60',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|in:ativo,inativo', 
            'role' => 'required|in:cliente,admin',
            'telefone' => 'required|string|max:20', 
            'client_id' => 'exists:clientes,id',
        ];
    }
}
