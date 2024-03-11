<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BairroRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Se você tiver políticas de autorização, pode definir aqui
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'regiao' => 'required|in:norte,sul,leste,oeste,centro,zona rural',
        ];
    }
}
