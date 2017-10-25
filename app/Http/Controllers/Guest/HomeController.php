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

	public function brinquedos(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedos', compact('party'));
	}

	public function brinquedosdetalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedosdetalhe', compact('party'));
	}

	public function brinquedoscompraonline(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedoscompraonline', compact('party'));
	}

	public function brinquedosreserva(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.brinquedosreserva', compact('party'));
	}

	/* PAGINAS CRIAR ANIVERSÁRIO */
	public function criarbrinquedosdetalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.criarbrinquedosdetalhe', compact('party'));
	}
	public function criarbrinquedosadicionarnovo(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.criarbrinquedosadicionarnovo', compact('party'));
	}
	public function criarbrinquedosecommerce(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.criarbrinquedosecommerce', compact('party'));
	}

	/* PAGINAS NOTIFICACAO */
	public function notificacaoaniversario(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoaniversario', compact('party'));
	}
	public function notificacaoimprimirconvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoimprimirconvite', compact('party'));
	}

	public function cotas(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas', compact('party'));
	}

	public function cotasdetalhe(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotasdetalhe', compact('party'));
	}

	public function cotasmensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotasmensagem', compact('party'));
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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {

	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
 	public function store(Request $request) {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request $request, $id)
    {

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}