<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartidaRequest extends FormRequest
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
            'edicao_id' => 'integer|exists:edicoes,id',
            'time_visitante_id' => 'integer|exists:times,id',
            'time_mandante_id' => 'integer|exists:times,id',
            'estadio_id' => 'integer|exists:estadios,id',
            'arbitro_id' => 'integer|exists:arbitros,id',
            'gols_mandante' => 'integer',
            'gols_visitante' => 'integer',
            'data' => 'date',
        ];
    }

    public function messages()
    {
        return [];
    }
}
