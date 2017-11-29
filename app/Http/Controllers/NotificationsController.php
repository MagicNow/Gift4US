<?php

namespace App\Http\Controllers;

use App\Models\Festas;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Http\Requests\ScrapsExport;
use Illuminate\Routing\Route;

class NotificationsController extends Controller
{
	private $cliente;
	private $route;

	public function __construct (Route $route) {
		$this->route = $route;

		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/' && $this->route->getName() !== 'notificacoes.convitedigital') {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	public function aniversario(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		$porpagina = 15;

		$pagina = $request->pagina ? $request->pagina : 1;

		$percent = [
			'clothes' => $this->calcClothes($party),
			'quotas' => $this->calcQuotas($party),
			'toys' => $this->calcToys($party)
		];

		$presencas = $party->confirmacaoPresenca();
		$presencasTotal = $presencas->count();

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

		return view('notificacao.aniversario', compact('request', 'party', 'titulo', 'client', 'presencas', 'presencasTotal', 'paginas', 'pagina'));
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
		$party = Festas::find($festa_id);
		$pages = $request->pages ? $request->pages : 4;
		return view('notificacao.convite-digital', compact('party', 'pages'));
	}

	public function enviarEmail(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.enviar-email', compact('party'));
	}

	public function enviarConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.enviar-convite', compact('party'));
	}

	public function imprimirConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.imprimir.convite', compact('party'));
	}

	public function imprimirListaPresentes(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.imprimir.lista-presentes', compact('party'));
	}

	public function imprimirPresencas(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);

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

		return view('notificacao.imprimir.presencas-confirmadas', compact('party', 'presencas', 'paginas', 'porpagina'));
	}

    public function exportaRecados(Request $request, $festa_id, ScrapsExport $export)
    {
    	$scraps = Festas::find($festa_id)->mensagem()->select('nome', 'mensagem')->get(); //->toArray();

        // work on the export
        return $export->sheet('Recados', function($sheet) use($scraps) {
			$sheet->fromArray($scraps);
			$sheet->freezeFirstRow();
        })->export('xls');
    }
}
