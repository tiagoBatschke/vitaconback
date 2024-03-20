<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiferencialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // A autorização é tratada em outro lugar
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
            'area_comum' => 'required|boolean',
        ];
    }
}