<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePassword;
use App\Mail\NewPassword;
use App\Models\Clientes;
use Illuminate\Support\Facades\Hash;

class PasswordRecoveryController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/') {
				return redirect()->route('home');
				exit;
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
	public function show(Request $request)
	{
		if (!session('errors')) {
			$password = str_random(8);

			$this->cliente->senha = Hash::make($password);
			$this->cliente->save();

			$content = [
				'title'	 	=> 'Senha provisória',
				'body' 	 	=> 'Olá, sua senha provisória é: ',
				'password'	=> $password,
				'button' 	=> 'Clique aqui para acessar o site',
				'url'		=> route('usuario.nova-senha.recuperar.show')
			];

			$mail = Mail::to($this->cliente->email)
						->send(new NewPassword($content));
		}

		$client = $this->cliente;
		$method = $request->method();
		$view = 'site.inc.usuarios.nova_senha_recuperar';

		if ($request->ajax()) {
			return view($view, compact('client'));
		} else {
			$titulo = 'Senha';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update(StorePassword $request)
	{
		if (!Hash::check($request->provisoria, $this->cliente->senha)) {
			return back()->withErrors('Senha não confere');
		}

		$data = [ 'senha' => Hash::make($request->senha)];
		$request->merge($data);

		$this->cliente->fill($request->all());
		$store = $this->cliente->save();

		return redirect()->route('nova-senha.index');
	}
}