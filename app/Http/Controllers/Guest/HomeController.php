<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use App\Models\ConfirmacaoPresenca;
use App\Models\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfirmPresence;
use App\Http\Requests\StoreMessage;

class HomeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);

		if (!$party) {
			abort(403, 'Unauthorized action.');
		}

		if ($party->ativo == 0) {
			abort(404, 'Página não encontrada.');
		}

		$percent = [
			'clothes' => $this->calcClothes($party),
			'quotas' => $this->calcQuotas($party),
			'toys' => $this->calcToys($party)
		];

		return view('convidado.home', compact('party', 'percent'));
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

	public function login(Request $request)
	{
		$name = $request->name;
		$party = Festas::where('ativo', 1)
						->where(function ($query) use ($name) {
							$query->where('nome', 'LIKE', '%' . $name . '%')
								  ->orWhere('codigo', 'LIKE', $name);
						})
						->first();

		if (isset($party) && !empty($party)) {
			return redirect()->route('convidado.index', $party->id);
		} else {
			return redirect('/')->with('convidado', 'Nenhuma festa encontrada!');
		}
	}

	public function confirmarPresenca(StoreConfirmPresence $request, $festa_id)
	{
		$festa = Festas::find($festa_id);

		if (!$festa) {
			abort(403, 'Unauthorized action.');
		}

		$convidado = new ConfirmacaoPresenca();
		$convidado->fill($request->all());

		$festa->confirmacaoPresenca()->save($convidado);

		return response()
			->json(['response' => 'Confirmação de presença efetuada com sucesso.']);
	}

	public function escreverMensagem(StoreMessage $request, $festa_id)
	{
		$festa = Festas::find($festa_id);

		if (!$festa) {
			abort(403, 'Unauthorized action.');
		}

		$mensagem = new Mensagem();
		$mensagem->fill($request->all());

		$festa->mensagem()->save($mensagem);

		return response()
			->json(['response' => 'Mensagem enviada com sucesso.']);
	}
}