<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Produtos;
use XmlParser;

class GiftsController extends Controller {
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
		$products = Produtos::where('categoria', 'roupa')
						->where('status', 1);

		if ($request->busca) {
			if ($request->filtrar) {
				switch ($request->filtrar) {
					case 'cor':
						$products = $products->where('cor', 'LIKE', '%' . $request->busca . '%');
						break;
					case 'nome':
						$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%');
						break;
					default:
						$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%')
											->orWhere('cor', 'LIKE', '%' . $request->busca . '%');
						break;
				}
			}
		}

		$products = $products->get();
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.roupas', compact('request', 'titulo', 'client', 'products'));
	}
}
