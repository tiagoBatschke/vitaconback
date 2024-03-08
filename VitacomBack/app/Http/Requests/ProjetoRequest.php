<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
            'cliente_id' => 'required|exists:clientes,id', // Verifica se o cliente com o ID fornecido existe na tabela de clientes
            'tipos' => 'required|string|max:255',
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
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'cliente_id.exists' => 'O cliente selecionado não existe.',
            'tipos.required' => 'O campo tipos é obrigatório.',
            'status' => 'required|string|in:ativo,inativo',
            // Adicione outras mensagens de erro conforme necessário
        ];
    }
}