<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            'nome_fantasia' => 'required|min:5|regex:/^[a-zA-Z]/',
            'documento' => [
                'required',
                'numeric',
                'min:11',
                'integer',
                Rule::unique('clients')->ignore($this->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('clients')->ignore($this->id),
            ],
            'telefone' => 'required|integer|numeric'
        ];
    }

    /**
     * Mensagem personalizada de acordo com o campo
     * @return array
     */
    public function messages() {
        return [
            'nome_fantasia.required' => 'O campo Nome do Cliente é obrigatório.',
            'nome_fantasia.min' => 'O campo Nome do Cliente deve conter no mínimo 5 caracteres.',
            'nome_fantasia.regex' => 'O campo Nome do Cliente deve conter apenas letras.',
            'documento.required' => 'O campo CPF / CNPJ é obrigatório.',
            'documento.min' => 'O campo CPF / CNPJ deve conter no mínimo 11 dígitos.',
            'documento.max' => 'O campo CPF / CNPJ deve conter no máximo 14 dígitos.',
            'documento.unique' => 'O CPF / CNPJ já existe.',
            'documento.numeric' => 'O campo CPF / CNPJ deve conter apenas números.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail deve ser um um e-mail é válido.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
        ];
    }


}