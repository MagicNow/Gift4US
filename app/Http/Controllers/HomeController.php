<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Bancos;
use App\Http\Requests\StoreBirthdayPhoto;
use App\Http\Requests\StoreBirthdayStep1;

class HomeController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/' && request()->path() !== '/') {
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

	public function meus_aniversarios(Request $request)
	{
		$client = $this->cliente;
		$method = $request->method();
		$view 	= 'site.inc.usuarios.meus_aniversarios';

		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.usuarios', compact('view', 'titulo', 'client'));
	}

	public function meus_aniversarios_upload(Request $request)
	{
		$path = basename($request->file->store('public/birthdays'));

		return response()
			->json(['path' => $path]);
	}

	public function meus_aniversarios_excluir(Request $request)
	{
		$client = $this->cliente;
		$method = $request->method();
		$view 	= 'site.inc.usuarios.meus_aniversarios_excluir';
		if ($request->ajax()) {
			return view($view, compact('client'));;
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	public function meus_aniversarios_novo(Request $request)
	{
		$client = $this->cliente;
		$method = $request->method();

		if (isset($request->number)) {
			$view = 'site.criar-aniversario.' . $request->number;
		} else {
			$view = 'site.criar-aniversario.1';
		}

		if ($request->ajax()) {
			return view($view, compact('client'));;
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	public function usuarios(Request $request)
	{
		$secao 		= 'cadastro';
		$titulo 	= 'RESGATAR vALORES';
		return view('site.usuarios', compact('secao', 'titulo'));
	}
}
