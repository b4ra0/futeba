<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartidaRequest extends FormRequest
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
            'edicao_id' => 'required|integer|exists:edicoes,id',
            'time_visitante_id' => 'required|integer|exists:times,id',
            'time_mandante_id' => 'required|integer|exists:times,id',
            'estadio_id' => 'required|integer|exists:estadios,id',
            'arbitro_id' => 'required|integer|exists:arbitros,id',
            'gols_mandante' => 'required|integer',
            'gols_visitante' => 'required|integer',
            'data' => 'date',
        ];
    }

    public function messages()
    {
        return [
            'edicao_id.required' => 'O campo edição é obrigatório.',
            'edicao_id.integer' => 'O campo edição deve ser um número inteiro.',
            'edicao_id.exists' => 'A edição selecionado não é válida.',
            'time_visitante_id.required' => 'O campo Time Visitante é obrigatório.',
            'time_visitante_id.integer' => 'O campo Time Visitante deve ser um número inteiro.',
            'time_visitante_id.exists' => 'O Time Visitante selecionado não é válido.',
            'time_mandante_id.required' => 'O campo Time mandante é obrigatório.',
            'time_mandante_id.integer' => 'O campo Time mandante deve ser um número inteiro.',
            'time_mandante_id.exists' => 'O Time mandante selecionado não é válido.',
            'arbitro_id.required' => 'O campo arbitro é obrigatório.',
        ];
    }
}
