<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Defina como `true` se não houver restrições de autorização
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:clientes|max:255',
            'contato' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'status' => 'required|string|in:ativo,inativo',
            // Adicione outras regras de validação conforme necessário
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está em uso.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O campo status deve ser "ativo" ou "inativo".', // Mensagem para quando o valor não está dentro das opções permitidas
            // Adicione outras mensagens de erro conforme necessário
        ];
    }
}