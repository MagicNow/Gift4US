<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminProducts extends FormRequest
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
			'imagem' => 'mimes:jpeg,bmp,png,jpg,gif',
			'categoria' => 'required|in:roupa,brinquedo',
			'titulo' => 'required',
			'descricao' => 'required',
			'cor' => 'max:50',
			'preco_venda' => 'required|numeric'
		];
	}
}
