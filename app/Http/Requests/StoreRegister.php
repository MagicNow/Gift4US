<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegister extends FormRequest
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
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:clientes',
            'tel' => 'required|max:15',
            'senha' => 'required',
            'confirma_senha' => 'required',
            'bancos_id' => 'required|max:15',
            'agencia' => 'required|max:10',
            'tipo_conta' => 'required|in:corrente,poupanca',
            'conta' => 'required|max:14',
            'cpf' => 'required|max:14'
        ];
    }
}
