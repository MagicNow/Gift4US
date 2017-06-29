<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use App\Models\Bancos;
use App\Models\Clientes;
use App\Models\ClientesContas;

class RegisterController extends Controller {
	public function create(Request $request) {
		// $bancos 	= Bancos::select('id', DB::raw("concat(id, ' - ', nome) as nome"))
		$bancos 	= Bancos::orderBy('nome', 'ASC')
							->pluck('nome', 'id');
		$bancos 	= ['' => 'Selecione'] + $bancos->toArray();
		$secao 		= 'cadastro';
		$titulo 	= 'Criar novo usuário';
		return view('site.cadastro', compact('secao', 'titulo', 'bancos'));
	}

	public function store(StoreRegister $request) {
		$input = $request->all();

		$phone = preg_replace('/\D/', '', $request->tel);
		$data = [
			'telefone_ddd' => substr($phone, 0, 2),
			'telefone_numero' => substr($phone, 2, strlen($phone)),
			'cpf' => preg_replace('/\D/', '', $request->cpf)
		];

		$request->merge($data);

		$client = new Clientes;
		$client->fill($request->all());
		$store = $client->save();

		$client->conta()
			   ->save(new ClientesContas($request->all()));

		return redirect()->route('home');
	}
}