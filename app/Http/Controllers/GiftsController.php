<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Festas;
use App\Models\FestasLayouts;
use App\Models\ProdutosTipos;
use App\Models\Produtos;
use App\Models\Cotas;
use App\Http\Requests\StoreQuotas;
use Intervention\Image\ImageManagerStatic as Image;
use XmlParser;
use Validator;

class GiftsController extends Controller {
	private $cliente;

	public function __construct () {
		$this->middleware(function ($request, $next) {
			if (!session('client_id') && request()->path() !== '/' && request()->path() !== '/') {
				return redirect()->route('home');
			}

			$this->cliente = Clientes::find(session('client_id'));

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$products = Produtos::where('categoria', 'roupa')->where('status', 1);

		if (!isset($party) || empty($party)) {
			abort(404, 'Page not found.');
		}

		if ($party->clientes_id != $this->cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		if ($request->busca) {
			$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'maiorPreco':
					$products = $products->orderBy('preco_venda', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('preco_venda', 'ASC');
					break;
				case 'AZ':
					$products = $products->orderBy('titulo', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('titulo', 'DESC');
					break;
				case 'MaisVendidos':
					break;
				case 'Lancamentos':
					break;
			}
		}

		$selected = $party->produto->where('categoria', 'roupa')->pluck('id')->toArray();

		if ($request->selecionados) {
			$products = $products->whereIn('id', $selected);
		}

		$products = $products->get();
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.roupas', compact('request', 'titulo', 'client', 'products', 'party', 'selected'));
	}

	public function toys(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$categories = ProdutosTipos::with('produtos');
		$client = $this->cliente;
		$selected = $party->tipo->pluck('id')->toArray();

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$categories = $categories->orderBy('nome', 'ASC');
					break;
				case 'ZA':
					$categories = $categories->orderBy('nome', 'DESC');
					break;
			}
		}
		$categories = $categories->get();

		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.brinquedos', compact('request', 'titulo', 'client', 'party', 'categories', 'selected'));
	}

	public function toysList(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$categories = $party->tipo->pluck('id')->toArray();
		$products = Produtos::where('categoria', 'brinquedo')
							->whereIn('tipo_id', $categories);
							// ->where('status', 1);

		if (!isset($party) || empty($party)) {
			abort(404, 'Page not found.');
		}

		if ($party->clientes_id != $this->cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		if ($request->busca) {
			$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'maiorPreco':
					$products = $products->orderBy('preco_venda', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('preco_venda', 'ASC');
					break;
				case 'AZ':
					$products = $products->orderBy('titulo', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('titulo', 'DESC');
					break;
				case 'MaisVendidos':
					break;
				case 'Lancamentos':
					break;
			}
		}

		$selected = $party->produto->where('categoria', 'brinquedo')->pluck('id')->toArray();
		$add = [];

		if ($request->selecionados) {
			$products = $products->whereIn('id', $selected);
		}

		$products = $products->paginate(30);
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.brinquedos-lista', compact('request', 'titulo', 'client', 'products', 'party', 'selected', 'add'));
	}

	public function preview($festa_id, $layout_id)
	{
		$festa = Festas::find($festa_id);
		$layout = FestasLayouts::find($layout_id);

		if ($festa->clientes_id != $this->cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$client = $this->cliente;
		$titulo = 'CRIANDO ANIVERSÁRIO';
		return view('site.criar-aniversario.preview', compact('festa', 'client', 'titulo', 'layout'));
	}

	public function toysAdd(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		$selected = $party->produto->where('categoria', 'brinquedo')->pluck('id')->toArray();
		$add = [];

		return view('site.presentes.brinquedos-adicionar', compact('request', 'titulo', 'client', 'party', 'selected', 'add'));
	}

	public function toysDetail(Request $request, $festa_id, $brinquedo_id)
	{
		$party = Festas::find($festa_id);
		$product = Produtos::find($brinquedo_id);

		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';

		return view('site.presentes.brinquedos-detalhe', compact('request', 'titulo', 'client', 'party', 'product'));
	}

	public function quotas(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$client = $this->cliente;
		$quotasTotal = $party->cotas->count();

		$titulo = 'ÁREA DO USUÁRIO';
		return view('site.presentes.cotas', compact('request', 'titulo', 'client', 'party', 'quotasTotal'));
	}

	public function quotasAdd(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';
		$quotasTotal = $party->cotas->count();
		$add = [];

		return view('site.presentes.cotas-adicionar', compact('request', 'titulo', 'client', 'party', 'add', 'quotasTotal'));
	}

	public function quotasStore(StoreQuotas $request, $festa_id)
	{
		$input = $request->all();

        $rules = StoreQuotas::rules();
		$festa = Festas::find($festa_id);

		if ($festa->clientes_id != $this->cliente->id) {
			abort(403, 'Unauthorized action.');
		}

 		$input['festas_id'] = $festa_id;
 		$input['valor_total'] = str_replace(',', '.', str_replace('.', '', $input['valor_total']));
 		$input['foto'] = $this->upload($request);

		$cota = new Cotas();
		$cota->fill($input);

		$festa->cotas()->save($cota);

		if ($input['salvar'] === 'salvar') {
			return redirect()->route('usuario.meus-aniversarios.presentes.cotas', $festa->id);
		} else {
			return redirect()->route('usuario.meus-aniversarios.presentes.cotas.adicionar', $festa->id);
		}
	}

	public function quotasDetail(Request $request, $festa_id)
	{
		$party = Festas::find($festa_id);
		$client = $this->cliente;
		$titulo = 'ÁREA DO USUÁRIO';

		return view('site.presentes.cotas-detalhe', compact('request', 'titulo', 'client', 'party'));
	}

	private function upload(Request $request)
	{
		$path = basename($request->foto->store('public/quotas'));

		if (!\File::exists(storage_path('app/public/quotas/mask'))) {
			$folder = \File::makeDirectory(storage_path('app/public/quotas/mask'), 0775, true);
		}

		$img = Image::make(storage_path('app/public/quotas/' . $path));
		$img->resize(780, null, function ($constraint) {
				$constraint->aspectRatio();
			})
			->save(storage_path('app/public/quotas/' . $path));

		return $path;
	}
}
