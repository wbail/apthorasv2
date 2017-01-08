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
            'cliente' => 'required',
            'data_entrega' => 'required|date_format:d/m/Y'
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
            'data_entrega.required' => 'O campo Data de Entrega é obrigatório.'
        ];
    }


}
