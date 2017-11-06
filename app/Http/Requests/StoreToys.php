<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreToys extends FormRequest
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
			'imagem' => 'required|file',
			'titulo' => 'required|max:100',
			'descricao' => 'max:255',
			'preco_venda' => 'required|regex:/^[+-]?[0-9]{1,3}(?:\.?[0-9]{3})*,[0-9]{2}$/',
			'lojas' => 'required'
		];
	}
}
