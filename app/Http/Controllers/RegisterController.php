<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use App\Models\Bancos;
use App\Models\Clientes;
use App\Models\ClientesContas;
use Illuminate\Support\Facades\Hash;

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
			'cpf' => preg_replace('/\D/', '', $request->cpf),
			'senha' => Hash::make($request->senha)
		];

		$request->merge($data);

		$client = new Clientes;
		$client->fill($request->all());
		$store = $client->save();

		$client->conta()
			   ->save(new ClientesContas($request->all()));

		return redirect()->route('home');
	}

	public function login(Request $request) {
		$client = Clientes::where('email', $request->email)->first();
		if (!$client || !Hash::check($request->senha, $client->senha)) {
			return redirect('/')->with('status', 'E-mail e/ou senha incorretos!');
		}

		session(['client_id' => $client->id]);

		return redirect()->route('usuario.meus-aniversarios');
	}
}