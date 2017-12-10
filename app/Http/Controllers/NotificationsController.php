<?php

namespace App\Http\Controllers;

use App\Models\Festas;
use App\Models\Clientes;
use App\Http\Requests\ScrapsExport;
use Illuminate\Http\Request;
use App\Mail\InviteSend;
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

		return view('notificacao.aniversario', compact('client', 'request', 'party', 'titulo', 'client', 'presencas', 'presencasTotal', 'paginas', 'pagina'));
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

    public function exportaRecados(Request $request, $festa_id, ScrapsExport $export)
    {
    	$scraps = $this->festa->mensagem()->select('nome', 'mensagem')->get(); //->toArray();

        // work on the export
        return $export->sheet('Recados', function($sheet) use($scraps) {
			$sheet->fromArray($scraps);
			$sheet->freezeFirstRow();
        })->export('xls');
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
}
