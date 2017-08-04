<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBirthdayStep1 extends FormRequest
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
			'endereco' => 'required|max:255',
			'referencia' => 'max:255'
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */

	public function messages()
	{
		return [
			'endereco.required' => 'Campo endereço obrigatório'
		];
	}
}
