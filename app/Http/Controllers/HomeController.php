<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Bancos;

class HomeController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/') {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	public function index(Request $request)
	{
		return view('site.home');
	}

	public function nova_senha_recuperar(Request $request) {
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

	public function transferencia(Request $request)
	{
		$client = $this->cliente;
		$method = $request->method();
		$view 	= 'site.inc.usuarios.transferencia';
		if ($request->ajax()) {
			return view($view, compact('client'));
		} else {
			$titulo = 'RESGATAR VALORES';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	public function meus_aniversarios(Request $request)
	{
		$client = $this->cliente;
		$method = $request->method();
		$view 	= 'site.inc.usuarios.meus_aniversarios';
		if ($request->ajax()) {
			return view($view);
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	public function meus_aniversarios_excluir(Request $request)
	{
		$method = $request->method();
		$view 	= 'site.inc.usuarios.meus_aniversarios_excluir';
		if ($request->ajax()) {
			return view($view);
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo'));
		}
	}

	public function usuarios(Request $request)
	{
		$secao 		= 'cadastro';
		$titulo 	= 'RESGATAR vALORES';
		return view('site.usuarios', compact('secao', 'titulo'));
	}
}
