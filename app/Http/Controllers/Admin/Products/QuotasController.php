<?php

namespace App\Http\Controllers\Admin\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Req;
use Auth;
use Illuminate\Http\Request;
use App\Models\Cotas;
use Illuminate\Support\Facades\Input;
use Redirect;

class QuotasController extends Controller
{
	public function __construct()
	{
		if (Auth::check()) {
			return redirect()->route('admin.login');
		}
	}

	public function index(Request $request)
	{
		$section = 'cotas';
		$produtos = Cotas::orderBy('id', 'desc')
						->with('festa');

		if ($request->titulo) {
			$produtos = $produtos->where('titulo', 'LIKE', '%' . $request->titulo . '%');
		}

		$produtos = $produtos->simplePaginate(30);

		return view('admin.produtos.cotas.list', compact('produtos', 'section'));
	}

	public function destroy (Request $request) {
		Cotas::destroy($request->id);

		return redirect()->route('admin.products.quotas.index')->with('status', 'Cota removida com sucesso!');
	}
}