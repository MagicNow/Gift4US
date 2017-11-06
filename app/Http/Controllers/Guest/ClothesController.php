<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
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
			$percent = round(($this->clothesAvalible->count() * 100) / $clothesTotal, 0, PHP_ROUND_HALF_EVEN);
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id = null)
	{
		$party = $this->party;
		$products = $this->clothesAvalible;

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

		$products = $products->get();

		return view('convidado.roupas.index', compact('request', 'party', 'products'));
	}

	public function mensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.roupas.mensagem', compact('request', 'party'));
	}

	public function detalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.roupas.detalhe', compact('request', 'party'));
	}
}