<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBirthdayStep3 extends FormRequest
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
			'ciclo_vida' => 'required|in:Bebê,Criança,Adolescente',
			'tamanho_camiseta' => 'required',
			'tamanho_calca' => 'required',
			'tamanho_sapato' => 'required'
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
			'ciclo_vida.required' => 'Campo ciclo de vida obrigatório',
			'tamanho_camiseta.required' => 'Campo de tamanho de camiseta obrigatório',
			'tamanho_calca.required' => 'Campo de tamanho de calça obrigatório',
			'ciclo_vida.required' => 'Campo de tamanho de sapato obrigatório'
		];
	}
}
