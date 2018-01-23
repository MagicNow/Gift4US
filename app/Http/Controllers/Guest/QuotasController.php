<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use App\Models\Cotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class QuotasController extends Controller {
	var $party;

	public function __construct(Request $request) {
		$this->middleware(function ($request, $next) {
			$this->party = Festas::where('slug', $request->route('slug'))->firstOrFail();

			if ($this->party->ativo == 0 && session('client_id') !== $this->party->clientes_id) {
				abort(404, 'Página não encontrada.');
			}

			$this->quotas = $this->party->cotas();

			$quotasTotal = $this->quotas->sum('quantidade_cotas');
			$this->quotasAvalible = $this->quotas;
			
			$percent = $this->quotasAvalible->sum('quantidade_cotas') > 0 ? round(($this->quotasAvalible->sum('quantidade_cotas') * 100) / $quotasTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id = null)
	{
		$party = $this->party;
		$products = $this->quotasAvalible;

		if ($request->busca) {
			$products = $products->where('nome', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$products = $products->orderBy('nome', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('nome', 'DESC');

					break;
				case 'maiorPreco':
					$products = $products->orderBy('valor_total', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('valor_total', 'ASC');
					break;
			}
		}

		$products = $products->get();

		return view('convidado.cotas.index', compact('request', 'party', 'products'));
	}

	public function detalhe(Request $request, $festa_id, $produto_id)
	{
		$party = $this->party;
		$product = Cotas::find($produto_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.cotas.detalhe', compact('request', 'party', 'product'));
	}

	public function mensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas.mensagem', compact('party'));
	}
}