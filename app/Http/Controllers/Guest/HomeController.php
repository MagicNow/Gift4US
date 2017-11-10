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
	public function __construct () {

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.home', compact('party'));
	}

	public function login(Request $request)
	{
		$name = $request->input('name');
		$party = Festas::where('nome', 'LIKE', '%' . $name . '%')->first();
		if (isset($party) && !empty($party)) {
			return redirect()->route('convidado.index', $party->id);
		} else {
			session()->flash('convidado', 'Código da festa não existe.');
			return redirect('/');
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