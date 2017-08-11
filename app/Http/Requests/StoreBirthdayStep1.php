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
	public static function rules()
	{
		return [
			'nome' => 'required|max:100',
			'sexo' => 'required',
			'idade_anos' => 'required',
			'idade_meses' => 'required',
			'festa_dia' => 'required',
			'festa_mes' => 'required',
			'festa_ano' => 'required',
			'festa_hora' => 'required',
			'festa_minuto' => 'required'
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
			'nome.required' => 'Campo nome obrigatório',
			'sexo.required' => 'Campo nome obrigatório',
			'idade_anos.required'  => 'Campo anos obrigatório',
			'idade_meses.required'  => 'Campo meses obrigatório',
			'festa_dia.required'  => 'Campo dia da festa obrigatório',
			'festa_mes.required'  => 'Campo mês da festa obrigatório',
			'festa_hora.required'  => 'Campo hora da festa obrigatório',
			'festa_minuto.required'  => 'Campo minuto da festa obrigatório'
		];
	}
}
