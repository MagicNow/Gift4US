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

	public function usuarios(Request $request)
	{
		$secao 		= 'cadastro';
		$titulo 	= 'RESGATAR vALORES';
		return view('site.usuarios', compact('secao', 'titulo'));
	}
}
