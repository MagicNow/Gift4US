<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class TransferController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id')) {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	public function index(Request $request)
	{
		$client = $this->cliente;
		$view 	= 'site.inc.usuarios.transferencia';
		if ($request->ajax()) {
			return view($view, compact('client'));
		} else {
			$titulo = 'RESGATAR VALORES';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

	public function store(Request $request)
	{
		return redirect()->route('transferencia.index')->with('status', 'Transferência efetuada com sucesso!');
	}
}