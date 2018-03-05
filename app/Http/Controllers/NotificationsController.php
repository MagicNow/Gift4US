<?php

namespace App\Http\Controllers;

use DB;
use App\Models\FestasProdutos;
use App\Models\CotasCompras;
use App\Models\Festas;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Mail\InviteSend;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
	private $cliente;
	private $festa;
	private $route;

	public function __construct (\Illuminate\Routing\Route $route) {
		$this->route = $route;

		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/' && $this->route->getName() !== 'notificacoes.convitedigital') {
				return redirect()->route('home');
			}

			$this->festa = Festas::findOrFail($request->festa_id);
			$this->cliente = Clientes::find(session('client_id'));

			$toys = $this->festa->produto()->where('categoria', 'brinquedo');
			$clothes = $this->festa->produto()->where('categoria', 'roupa');
			$quotas = $this->festa->cotas();

			$toysTotal = $toys->count();
			$clothesTotal = $clothes->count();
			$quotasBuyed = CotasCompras::whereIn('cotas_id', $quotas->pluck('id'));

			$quotasBuyedCost = $quotasBuyed->withCount([
				'cotas AS preco_venda' => function ($query) {
					$query->select(DB::raw("FORMAT(SUM(valor_total / quantidade_cotas), 2) as paidsum"));
				}
			])->get()->toArray();

			view()->share([
				'toysTotal' => $toysTotal,
				'toysBuyed' => $toys->whereNotNull('nome')->count(),
				'toysNotShow' => $toys->whereNotNull('nome')->whereNotNull('nome')->whereVisualizado(0)->count(),
				'clothesTotal' => $clothesTotal,
				'clothesBuyed' => $clothes->whereNotNull('nome')->count(),
				'clothesNotShow' => $clothes->whereNotNull('nome')->whereNotNull('nome')->whereVisualizado(0)->count(),
				'clothesBuyedCost' => $clothes->whereNotNull('nome')->sum('preco_venda'),
				'quotasTotal' => $quotas->sum('quantidade_cotas'),
				'quotasBuyed' => $quotasBuyed->count(),
				'quotasNotShow' => $quotasBuyed->whereVisualizado(0)->count(),
				'quotasBuyedCost' => array_sum(array_map(function($var) { return $var['preco_venda']; }, $quotasBuyedCost))
			]);

			return $next($request);
		});
	}

	public function aniversario(Request $request, $festa_id)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$porpagina = 15;
		$client = $this->cliente;

		$pagina = $request->pagina ? $request->pagina : 1;

		$party = $this->festa;
		$percent = [
			'clothes' => $this->calcClothes($this->festa),
			'quotas' => $this->calcQuotas($this->festa),
			'toys' => $this->calcToys($this->festa)
		];

		$presencas = $this->festa->confirmacaoPresenca();
		$presencasTotal = $presencas->sum('numero_pessoas');

		if ($request->modal == 'lista-de-aniversarios') {
			$presencas->update(['visualizado' => 1]);
		}

		if ($request->busca && !empty($request->busca)) {
			$presencas = $presencas->where('nome', 'like', '%' . $request->busca . '%');
		} else {
			if ($request->inicial) {
				$presencas = $presencas->where('nome', 'like', $request->inicial . '%');
			}
		}

		$paginas = round($presencas->count() / $porpagina) === 0.0 ? 1 : round($presencas->count() / $porpagina);

		$presencas = $presencas
						->skip($porpagina * ($pagina - 1))
						->take($porpagina)
						->orderBy('nome')->get();

		$presentes = NULL;
		if ($request->modal == 'lista-de-presentes') {
			FestasProdutos::where('festas_id', $this->festa->id)->update(['visualizado' => 1]);
			DB::table('cotas_compras')
				->join('cotas', 'cotas.id', 'cotas_compras.cotas_id')
				->where('cotas.festa_id', $this->festa->id)
				->update(['visualizado' => 1]);
	
			$presentes = $this->listaPresentes($request);
		}

		return view('notificacao.aniversario', compact('client', 'request', 'party', 'titulo', 'client', 'presencas', 'presencasTotal', 'paginas', 'pagina', 'presentes'));
	}

	private function calcClothes ($party) {
		$this->clothes = $party->produto()->where('categoria', 'roupa');
		$clothesTotal = $this->clothes->count();
		$this->clothesAvalible = $this->clothes->whereNull('nome');

		return $this->clothesAvalible->count() > 0 ? round(($this->clothesAvalible->count() * 100) / $clothesTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
	}

	private function calcQuotas ($party) {
		$this->quotas = $party->cotas();
		$quotasTotal = $this->quotas->sum('quantidade_cotas');
		$this->quotasAvalible = $this->quotas;

		return $this->quotasAvalible->sum('quantidade_cotas') > 0 ? round(($this->quotasAvalible->sum('quantidade_cotas') * 100) / $quotasTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
	}

	private function calcToys ($party) {
		$this->toys = $party->produto()->where('categoria', 'brinquedo');
		$toysTotal = $this->toys->count();
		$this->toysAvalible = $this->toys->whereNull('nome');

		return $this->toysAvalible->count() > 0 ? round(($this->toysAvalible->count() * 100) / $toysTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
	}

	public function conviteDigital(Request $request, $festa_id = null)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$party = $this->festa;
		$pages = $request->pages ? $request->pages : 4;
		$client = $this->cliente;

		return view('notificacao.convite-digital', compact('titulo', 'client', 'party', 'pages'));
	}

	public function enviarEmail(Request $request, $festa_id = null)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$client = $this->cliente;
		$lists = $this->cliente->festas()
					->whereNotIn('id', [ $festa_id ])
					->with('lista')
					->get();
		$partyLists = [];

		foreach ($lists as $list) {
			if ($list->lista->count() > 0) {
				$partyLists[] = $list->id;
			}
		}

		$party = $this->festa;
		return view('notificacao.enviar-email', compact('titulo', 'client', 'party', 'partyLists'));
	}

	public function enviarConvite(Request $request, $festa_id = null)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$client = $this->cliente;
		$party = $this->festa;

		return view('notificacao.enviar-convite', compact('titulo', 'client', 'party'));
	}

	public function imprimirConvite(Request $request, $festa_id = null)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$client = $this->cliente;
		$party = $this->festa;

		return view('notificacao.imprimir.convite', compact('titulo', 'party', 'client'));
	}

	public function imprimirListaPresentes(Request $request, $festa_id = null)
	{
		$titulo = 'ÁREA DO USUÁRIO';
		$client = $this->cliente;
		$party = $this->festa;

		return view('notificacao.imprimir.lista-presentes', compact('titulo', 'party', 'client'));
	}

	public function imprimirPresencas(Request $request, $festa_id = null)
	{
		$client = $this->cliente;
		$party = $this->festa;
		$titulo = 'ÁREA DO USUÁRIO';

		$porpagina = 48;
		$paginas = round($party->confirmacaoPresenca->count() / $porpagina) === 0.0 ? 1 : round($party->confirmacaoPresenca->count() / $porpagina);
		$presencas = [];
		
		for ($i = 0; $i < $paginas; $i++) {
			$presencas[$i] = $party
								->confirmacaoPresenca()
								->skip($porpagina * $i)
								->take($porpagina)
								->get();
		}

		return view('notificacao.imprimir.presencas-confirmadas', compact('titulo', 'client', 'party', 'presencas', 'paginas', 'porpagina'));
	}

    public function exportaRecados(Request $request, $festa_id)
    {
    	$scraps = $this->festa->mensagem()->select('nome', 'mensagem')->get(); //->toArray();

		$pdf = PDF::loadView('notificacao.recados', ['scraps' => $scraps]);
		return $pdf->download('recados.pdf');
    }

    public function submeterEmails(Request $request, $festa_id) {
    	$festa = Festas::findOrFail($festa_id);
		$user = session('client_id');

		if ($festa->clientes_id != $user) {
			abort(403, 'Unauthorized action.');
		}

		foreach ($festa->lista as $key => $email) {
			Mail::to($email->email)->send(new InviteSend($festa));
		}

		return redirect()->route('notificacoes.aniversario', $festa_id);
	}
	
	private function listaPresentes ($request) {
		$clothes = DB::table('festas_produtos')
						->select(DB::raw("produtos.id, produtos.titulo AS presente_nome, produtos.preco_venda AS valor_venda, festas_produtos.nome AS convidado_nome, festas_produtos.email AS convidado_email, festas_produtos.pagamento_status AS status, festas_produtos.updated_at"))
						->join('produtos', 'produtos.id', 'festas_produtos.produtos_id')
						->whereNotNull('festas_produtos.numero_pedido')
						->whereCategoria('roupa')
						->where('festas_produtos.festas_id', $this->festa->id);

		$toys = DB::table('festas_produtos')
						->select(DB::raw("produtos.id, produtos.titulo AS presente_nome,'irá presentear' AS valor_venda, festas_produtos.nome AS convidado_nome, festas_produtos.email AS convidado_email, festas_produtos.pagamento_status AS status, festas_produtos.updated_at"))
						->join('produtos', 'produtos.id', 'festas_produtos.produtos_id')
						->whereNotNull('festas_produtos.nome')
						->whereCategoria('brinquedo')
						->where('festas_produtos.festas_id', $this->festa->id);

		$products = DB::table('cotas_compras')
						->select(DB::raw("cotas.id, cotas.nome AS presente_nome, FORMAT((cotas.valor_total / cotas.quantidade_cotas), 2) AS valor_venda, cotas_compras.nome AS convidado_nome, cotas_compras.email AS convidado_email, cotas_compras.pagamento_status AS status, cotas_compras.updated_at"))
						->join('cotas', 'cotas.id', 'cotas_compras.cotas_id')
						->whereNotNull('cotas_compras.numero_pedido')
						->where('cotas.festa_id', $this->festa->id)
						->union($toys)
						->union($clothes);

		switch ($request->ordem) {
			case 'recentes':
				$products->orderBy('updated_at', 'DESC');
				break;
			case 'az':
				$products->orderBy('presente_nome', 'ASC');
				break;
			case 'convidados':
				$products->orderBy('convidado_nome', 'ASC');
				break;
		}

		$products = $products->get()
							->toArray();

		$page = isset($request->page) ? $request->page : 1;
		$paginate = 20;
		$offSet = ($page * $paginate) - $paginate;
		$itemsForCurrentPage = array_slice($products, $offSet, $paginate, true);
		$products = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($products), $paginate, $page);

		return $products;
	}
}
