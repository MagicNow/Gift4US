<?php
namespace App\Http\Controllers;

use \DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use App\Models\Clientes;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/') {
				return redirect()->route('home');
				exit;
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
		$client = $this->cliente;
		$method = $request->method();
		$view = 'site.inc.usuarios.nova_senha';
		if ($request->ajax()) {
			return view($view, compact('client'));
		} else {
			$titulo = 'Senha';
			return view('site.usuarios', compact('view', 'titulo', 'client'));
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
	public function store(StoreRegister $request) {

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
// dd($request->provisoria, $this->cliente);
// dd(Hash::check($request->provisoria, $this->cliente->senha));

		if (!Hash::check($request->provisoria, $this->cliente->senha)) {
			return back()->withErrors('Senha não confere');
		}

		$data = [ 'senha' => Hash::make($request->senha)];
		$request->merge($data);

		$this->cliente->fill($request->all());
		$store = $this->cliente->save();

		return redirect()->route('nova-senha.index');
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

	public function login(Request $request) {
		$client = Clientes::where('email', $request->email)->first();
		if (!$client || !Hash::check($request->senha, $client->senha)) {
			return redirect('/')->with('status', 'E-mail e/ou senha incorretos!');
		}

		session(['client_id' => $client->id]);

		return redirect()->route('usuario.meus-aniversarios');
	}
}