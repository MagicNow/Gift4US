<?php
namespace App\Http\Controllers;

use Validator;
use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use App\Http\Requests\StoreEditRegister;
use Illuminate\Support\Facades\Mail;
use App\Models\Bancos;
use App\Models\Clientes;
use App\Models\ClientesContas;
use App\Models\ClientesTemps;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailConfirm;
use App\Mail\RememberPassword;

class RegisterController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			$except = [
				'/',
				'usuario/login',
				'usuario/confirmar-dados',
				'usuario/recuperar-senha',
				'cadastro/create',
				'cadastro'
			];

			if (!session('client_id') && !in_array(request()->path(), $except)) {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
		$bancos 	= ['' => 'Selecione'] + Bancos::orderBy('nome', 'ASC')->pluck('nome', 'id')->toArray();
		$secao 		= 'cadastro';
		$titulo 	= 'Criar novo usuário';
		return view('site.cadastro', compact('secao', 'titulo', 'bancos'));
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
 	public function store(StoreRegister $request) {
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
		$client->save();
		session(['client_id' => $client->id]);

		if (isset($request->bancos_id) && !empty($request->bancos_id) &&
			isset($request->agencia) && !empty($request->agencia) &&
			isset($request->conta) && !empty($request->conta) &&
			isset($request->cpf) && !empty($request->cpf)) {

			$client->conta()
					->save(new ClientesContas($request->all()));
		}

		return redirect()->route('usuario.meus-aniversarios');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		var_dump('show', $id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		$client = $this->cliente;
		$method = $request->method();
		$view 	= 'site.inc.usuarios.editar_dados';
		if ($request->ajax()) {
			return view($view, compact('client'));
		} else {
			$titulo = 'Área do usuário';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StoreEditRegister $request, $id)
	{
		$input = $request->all();
		$token = Hash::make(date('YmdHis'));
		$message = '';

		if ($request->email !== $this->cliente->email) {
			$validator = Validator::make($request->all(), [
				'email' => 'unique:clientes'
			]);
	
			if ($validator->fails()) {
				return redirect()->route('cadastro.edit', [ 'id' => $this->cliente->id])
							->withErrors($validator)
							->withInput();
			}

			$data = [
				'email' => $request->email,
				'token' => $token
			];
			$clientTemp = ClientesTemps::updateOrCreate([ 'clientes_id' => $this->cliente->id ], $data);

			$content = [
				'title'	 	=> 'Confirme seus dados',
				'body' 	 	=> 'Olá, o e-mail da sua conta foi alterado',
				'button' 	=> 'Clique aqui para confirmar a alteração',
				'url'		=> route('usuario.confirma', ['token' => $token, 'id' => $this->cliente->id])
			];
			$mail = Mail::to($request->email)
						->send(new EmailConfirm($content));

			$message = 'Você receberá um email de confirmação.';
		} else {
			$message = 'Cadastro efetuado com sucesso.';
		}

		unset($input['email']);

		$telefone = explode(')', $input['tel']);
		$ddd = preg_replace( '/[^0-9]/', '', $telefone[0]);
		$phone = preg_replace( '/[^0-9]/', '', $telefone[1]);

		$input['telefone_ddd'] = $ddd;
		$input['telefone_numero'] = $phone;

		$this->cliente->fill($input);
		$store = $this->cliente->save();
		
		return redirect()->route('cadastro.edit', [ 'id' => $this->cliente->id])->with('message', $message);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login(Request $request) {
		$client = Clientes::where('email', $request->email)->first();

		if (!$client || !Hash::check($request->senha, $client->senha)) {
			return redirect('/')->with('status', 'E-mail e/ou senha incorretos!');
		}

		session(['client_id' => $client->id]);

		return redirect()->route('usuario.meus-aniversarios');
	}

	public function logout(Request $request) {
		$request->session()->forget('client_id');

		return redirect()->route('home');
	}

	public function confirmar(Request $request) {
		$client = ClientesTemps::where([ 'clientes_id' => $request->id, 'token' => $request->token ])
								->with('cliente')
								->first();

		if (!$client) {
			return redirect('/')->with('status', 'Token expirado!');
		}

		$client->cliente
				->update(['email' => $client->email]);

		return redirect()->route('home');
	}

	public function rememberPassword(Request $request) {
		$client = Clientes::where('email', $request->email)->first();

		if (!$client) {
			return response()
						->json(['success' => false, 'response' => 'E-mail não encontrado.']);
		}

		$senha = str_random(8);
		$client->senha = Hash::make($senha);
		$client->save();

		Mail::to($client->email)->send(new RememberPassword($client, $senha));

		return response()
					->json(['success' => true, 'response' => 'Uma nova senha de acesso foi encaminhada para seu e-mail.']);
	}
}
