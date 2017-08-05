<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use Illuminate\Support\Facades\Hash;
use App\Models\Clientes;
use App\Models\Festas;
use App\Http\Requests\StoreBirthdayStep1;
use App\Http\Requests\StoreBirthdayStep2;

class BirthdayController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/') {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$client 	= $this->cliente;
		$method 	= $request->method();
		$view 		= 'site.inc.usuarios.meus_aniversarios';

		$festas = $this->populateParties($client->festas);

		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.usuarios', compact('view', 'titulo', 'client', 'festas'));
	}

	private function populateParties($festas)
	{
		$festas_ativas = [];
		$festas_antigas = [];

		if (isset($festas) && count($festas) > 0) {
			foreach ($festas as $festa) {
				$data = $festa->festa_ano . '-' . $festa->festa_mes . '-' . $festa->festa_dia;

				if ($data >= date('Y-m-d')) {
					$festas_ativas[] = $festa;
				} else {
					$festas_antigas[] = $festa;
				}
			}
		}

		return [
			'festas_ativas' => $festas_ativas,
			'festas_antigas' => $festas_antigas
		];
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
		$client = $this->cliente;
		$method = $request->method();

		if (isset($request->number)) {
			$view = 'site.criar-aniversario.' . $request->number;
		} else {
			$view = 'site.criar-aniversario.1';
		}

		if ($request->ajax()) {
			return view($view, compact('client'));;
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
		}
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
 	public function store1(StoreBirthdayStep1 $request) {
 		$next = (int)$request->step + 1;

		$party = new Festas();
		$party->fill($request->all());
		$party->save();

		return redirect()->route('usuario.meus-aniversarios.novo.festa', [
					'number' => $next, 'festa_id' => $party->id
				]);
	}

 	public function store2(StoreBirthdayStep2 $request) {
 		$next = (int)$request->step + 1;
		return redirect()
					->route('usuario.meus-aniversarios.novo', $next)
					->with('party', $party);;
	}

 	public function store3(Request $request) {
 		$next = (int)$request->step + 1;
		return redirect()->route('usuario.meus-aniversarios.novo', $next)->withInput();
	}

 	public function store4(Request $request) {
 		$next = (int)$request->step + 1;
		return redirect()->route('usuario.meus-aniversarios.novo', $next)->withInput();
	}

 	public function store5(Request $request) {
 		$next = (int)$request->step + 1;
		return redirect()->route('usuario.meus-aniversarios.novo', $next)->withInput();
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

	public function upload(Request $request)
	{
		$path = basename($request->file->store('public/birthdays'));

		return response()
			->json(['path' => $path]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id = NULL)
	{
		$festa = Festas::find($id);

		if ($festa->clientes_id === $this->cliente->id) {
			$festa->delete();
		}

		return redirect()->route('usuario.meus-aniversarios');
	}

	public function aviso(Request $request, $id = NULL)
	{
		$client = $this->cliente;
		$method = $request->method();
		$festa = Festas::find($id);

		if ($festa->clientes_id !== $client->id) {
			return redirect()->route('usuario.meus-aniversarios');
		}

		$view 	= 'site.inc.usuarios.meus_aniversarios_excluir';
		if ($request->ajax()) {
			return view($view, compact('client', 'festa'));
		} else {
			$titulo = 'ÁREA DO USUÁRIO';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'festa'));
		}
	}

	public function meus_aniversarios_presentes()
	{
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.roupas', compact('titulo', 'client'));
	}
}