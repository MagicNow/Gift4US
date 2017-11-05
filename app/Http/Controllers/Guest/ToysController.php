<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ToysController extends Controller {
	private $party;
	private $toys;
	private $toysAvalible;

	public function __construct(Request $request) {
		$this->party = Festas::find($request->route('festa_id'));
		if (empty($this->party)) {
			abort(404, 'Página não encontrada.');
		}

		$this->toys = $this->party
						   ->produto()
						   ->where('categoria', 'brinquedo');

		$toysTotal = $this->toys->count();
		$this->toysAvalible = $this->toys->whereNull('nome');

		$this->middleware(function ($request, $next) use ($toysTotal) {
			$percent = round(($this->toysAvalible->count() * 100) / $toysTotal, 0, PHP_ROUND_HALF_EVEN);
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $festa_id)
	{
		$party = $this->party;
		$products = $this->toysAvalible;

		if ($request->busca) {
			$products->where('titulo', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$products->orderBy('titulo', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('titulo', 'DESC');
					break;
				case 'maiorPreco':
					$products->orderBy('preco_venda', 'DESC');
					break;
				case 'menorPreco':
					$products->orderBy('preco_venda', 'ASC');
					break;
			}
		}

		if ($request->categorias) {
			$products = $products->whereIn('tipo_id', $request->categorias);
		}

		$products = $products->get();

		return view('convidado.brinquedos.index', compact('request', 'party', 'products'));
	}

	public function detalhe(Request $request, $festa_id, $produto_id)
	{
		$party = $this->party;
		$product = Produtos::find($produto_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.brinquedos.detalhe', compact('request', 'party', 'product'));
	}

	public function compraOnline(Request $request, $festa_id, $produto_id)
	{
		$party = $this->party;
		$product = Produtos::find($produto_id);
		return view('convidado.brinquedos.compra-online', compact('request', 'party', 'product'));
	}

	public function reserva(Request $request, $festa_id, $produto_id)
	{
		$party = $this->party;
		$product = Produtos::find($produto_id);
		return view('convidado.brinquedos.reserva', compact('request', 'party', 'product'));
	}
}