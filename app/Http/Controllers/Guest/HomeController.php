<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

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

	public function roupas(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.roupas', compact('party'));
	}

	public function roupasmensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.roupasmensagem', compact('party'));
	}

	public function roupasdetalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.roupasdetalhe', compact('party'));
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
}