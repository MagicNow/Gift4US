<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ClothesController extends Controller {
	private $party;
	private $clothes;
	private $clothesAvalible;

	public function __construct(Request $request) {
		$this->party = Festas::find($request->route('festa_id'));
		if (empty($this->party)) {
			abort(404, 'Página não encontrada.');
		}

		$this->clothes = $this->party
						   ->produto()
						   ->where('categoria', 'roupa');

		$clothesTotal = $this->clothes->count();
		$this->clothesAvalible = $this->clothes->whereNull('nome');

		$this->middleware(function ($request, $next) use ($clothesTotal) {
			$percent = $this->clothesAvalible->count() > 0 ? round(($this->clothesAvalible->count() * 100) / $clothesTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id = null)
	{
		$party = $this->party;
		$products = $this->clothesAvalible;

		if ($request->busca) {
			$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$products = $products->orderBy('titulo', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('titulo', 'DESC');
					break;
				case 'maiorPreco':
					$products = $products->orderBy('preco_venda', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('preco_venda', 'ASC');
					break;
			}
		}

		$products = $products->get();

		return view('convidado.roupas.index', compact('request', 'party', 'products'));
	}

	public function mensagem(Request $request, $party_id)
	{
		$party = $this->party;
		return view('convidado.roupas.mensagem', compact('request', 'party'));
	}

	public function detalhe(Request $request, $party_id, $product_id)
	{
		$party = $this->party;
		$product = Produtos::find($product_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.roupas.detalhe', compact('request', 'party', 'product'));
	}


	public function compraOnline(Request $request, $festa_id, $product_id)
	{
		$party = $this->party;
		$product = Produtos::find($product_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.roupas.compra-online', compact('request', 'party', 'product'));
	}
}