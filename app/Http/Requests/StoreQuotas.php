<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotas extends FormRequest
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
    public static function rules()
    {
        return [
            'foto' => 'required|file',
            'nome' => 'required|max:100',
            'observacao' => 'max:255',
            'valor_total' => 'required',
            'dividir_cota' => 'required|boolean',
            'quantidade_cotas' => 'integer|required_if:dividir_cota,1'
        ];
    }
}
