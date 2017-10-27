<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class QuotasController extends Controller {
	public function index(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas.index', compact('party'));
	}

	public function detalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas.detalhe', compact('party'));
	}

	public function mensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas.mensagem', compact('party'));
	}
}