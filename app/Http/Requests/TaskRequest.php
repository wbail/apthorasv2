<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;


class TaskRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'descricao' => 'required|min:5',
            'prazo_finalizacao' => 'required|date_format:d/m/Y',
            'project' => 'required|integer'
        ];
    }

    public function messages() {
        return [
            'descricao.required' => 'O Campo Descrição é obrigatório.',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 5 caracteres.',
            'prazo_finalizacao.required' => 'O Campo Prazo para Finalização é obrigatório.',
            'project.required' => 'O Campo Projeto é obrigatório.',
        ];
    }
}
