<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|min:5',
            'client' => 'required',
            'data_entrega' => 'required|date_format:d/m/Y',
            'fase' => 'required',
            'status' => 'required|numeric|min:0|max:100'
        ];
    }

    /**
     * Mensagem personalizada de acordo com o campo
     * @return array
     */
    public function messages() {
        return [
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.min' => 'O campo Título deve conter no mínimo 5 caracteres.',
            'cliente.required' => 'O campo Cliente é obrigatório.',
            'data_entrega.required' => 'O campo Data de Entrega é obrigatório.',
            'fase.required' => 'O campo Fase é obrigatório.',
            'status.required' => 'O campo Status é obrigatório.',
        ];
    }


}
