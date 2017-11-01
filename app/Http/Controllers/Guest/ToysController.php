<?php
namespace App\Http\Controllers\Guest;

use App\Models\Festas;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ToysController extends Controller {
	private $party;

	public function __construct(Request $request) {
		$this->party = Festas::find($request->route('festa_id'));
		if (empty($this->party)) {
			abort(404, 'Página não encontrada.');
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $festa_id)
	{
		$party = $this->party;
		$products = $this->party->produto->where('categoria', 'brinquedo');
		return view('convidado.brinquedos.index', compact('party', 'products'));
	}

	public function detalhe(Request $request, $produto_id)
	{
		$party = $this->party;
		$product = Produtos::find($produto_id);
		return view('convidado.brinquedos.detalhe', compact('party', 'product'));
	}

	public function compraOnline(Request $request, $produto_id)
	{
		$party = $this->party;
		$product = Produtos::find($produto_id);
		return view('convidado.brinquedos.compra-online', compact('party', 'product'));
	}

	public function reserva(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedos.reserva', compact('party'));
	}

	public function criarDetalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedos.criar-detalhe', compact('party'));
	}
	public function criarAdicionarNovo(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedos.criar-adicionar-novo', compact('party'));
	}
	public function criarEcommerce(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedos.criar-ecommerce', compact('party'));
	}
}