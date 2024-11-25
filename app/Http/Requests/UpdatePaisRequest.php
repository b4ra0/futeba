<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaisRequest extends FormRequest
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
            'nome' => 'string',
            'sigla' => 'string|max:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.string' => 'Campo nome inválido',
            'sigla.string' => 'Campo sigla inválido',
            'sigla.max' => 'O campo sigla deve ter no máximo 3 caracteres',
        ];
    }
}
