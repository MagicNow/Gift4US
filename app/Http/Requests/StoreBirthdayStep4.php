<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBirthdayStep4 extends FormRequest
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
			'layout_id' => 'required|exists:festas_layouts,id'
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
			'layout_id.required' => 'Escolha de layout obrigatória'
		];
	}
}
