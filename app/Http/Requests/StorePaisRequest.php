<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'sigla' => 'required|string|max:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'Campo nome inválido',
            'sigla.required' => 'O campo sigla é obrigatório',
            'sigla.string' => 'Campo sigla inválido',
            'sigla.max' => 'O campo sigla deve ter no máximo 3 caracteres',
        ];
    }
}
