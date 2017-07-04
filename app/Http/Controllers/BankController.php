<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use App\Models\Bancos;
use App\Models\Clientes;
use App\Models\ClientesContas;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller {
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
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
		$client = $this->cliente;
		$bancos = ['' => 'Selecione'] + Bancos::orderBy('nome', 'ASC')->pluck('nome', 'id')->toArray();
		$view 	= 'site.inc.usuarios.dados_bancarios';

		if ($request->ajax()) {
			return view($view, compact('client', 'bancos'));
		} else {
			$titulo = 'Área do usuário';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'bancos'));
		}
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
 	public function store(Request $request) {
		$client = $this->cliente;
		$data 	= ['cpf' => preg_replace('/\D/', '', $request->cpf)];

		$request->merge($data);

		if (isset($conta) && $conta->clientes_id !== $client->id) {
			return response('Acesso não autorizado', 401);
		}

		$client->conta()
				->save(new ClientesContas($request->all()));

		return redirect()->route('dados-bancarios.edit', [ 'id' => $this->cliente->conta->id ]);
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
		$client = $this->cliente;
		$conta 	= ClientesContas::find($id);
		$bancos = ['' => 'Selecione'] + Bancos::orderBy('nome', 'ASC')->pluck('nome', 'id')->toArray();
		$view 	= 'site.inc.usuarios.dados_bancarios';

		if ($conta->clientes_id !== $client->id) {
			return response('Acesso não autorizado', 401);
		}

		if ($request->ajax()) {
			return view($view, compact('client', 'bancos', 'conta'));
		} else {
			$titulo = 'Área do usuário';
			return view('site.usuarios', compact('view', 'titulo', 'client', 'bancos', 'conta'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request $request, $id)
    {
		$conta 	= ClientesContas::find($id);
		$client = $this->cliente;
		$data 	= ['cpf' => preg_replace('/\D/', '', $request->cpf)];

		$request->merge($data);

		if ($conta->clientes_id !== $client->id) {
			return response('Acesso não autorizado', 401);
		}

		$conta 	= ClientesContas::find($id);
		$conta->fill($request->all());
		$conta->save();

		return redirect()->route('dados-bancarios.edit', [ 'id' => $this->cliente->conta->id ]);
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