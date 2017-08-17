<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Festas;
use App\Models\FestasLayouts;
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

	public function preview($festa_id, $layout_id)
	{
		$festa = Festas::find($festa_id);
		$layout = FestasLayouts::find($layout_id);

		if ($festa->clientes_id != $this->cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$client = $this->cliente;
		$titulo = 'CRIANDO ANIVERSÁRIO';
		return view('site.criar-aniversario.preview', compact('festa', 'client', 'titulo', 'layout'));
	}
}
