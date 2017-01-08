<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApontamentoRequest extends FormRequest {
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
            'status' => 'required|numeric|min:0|max:100'
        ];
    }

    public function messages() {
        return [
            'status.required' => 'O campo Progresso é obrigatório.',
            'status.numeric' => 'O campo Progresso é do tipo numérico.',
            'status.min' => 'O campo Progresso deve ter valores entre 0 e 100',
            'status.max' => 'O campo Progresso deve ter valores entre 0 e 100',
        ];
    }

}
