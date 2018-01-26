<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use App\Models\Produtos;
use App\Models\ProdutosTipos;
use App\Models\ProdutosMarcas;
use App\Models\Clientes;
use App\Models\Cotas;
use App\Models\Festas;
use App\Models\FestasProdutos;
use App\Models\FestasLista;
use App\Http\Requests\StoreList;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ApiController extends Controller {
	public function produtos()
	{
		$this->produtosReviva();
		$this->produtosPanda();

		die('Importação realizada com sucesso.');
	}

	private function produtosReviva()
	{
		$json = file_get_contents("https://api.awsli.com.br/v1/produto?format=json&ativo=true&chave_api=" . env('PRODUCTS_REVIVA_CHAVE_API') . "&chave_aplicacao=" . env('PRODUCTS_REVIVA_CHAVE_APP') . '&limit=' . env('PRODUCTS_REVIVA_LIMIT'));

		$data = json_decode($json);

		foreach ($data->objects as $value) {
			$categorias = $value->categorias;
			if (isset($categorias[0])) {
				$json = file_get_contents("https://api.awsli.com.br" . $categorias[0] . "?format=json&chave_api=" . env('PRODUCTS_REVIVA_CHAVE_API') . "&chave_aplicacao=" . env('PRODUCTS_REVIVA_CHAVE_APP'));
				$dataCat = json_decode($json);
				$tipo = ProdutosTipos::firstOrCreate(['nome' => $dataCat->nome]);
			}

			$json = file_get_contents("https://api.awsli.com.br/v1/produto_preco/" . $value->id . "?format=json&chave_api=" . env('PRODUCTS_REVIVA_CHAVE_API') . "&chave_aplicacao=" . env('PRODUCTS_REVIVA_CHAVE_APP'));
			$dataPreco = json_decode($json);


			$json = file_get_contents("https://api.awsli.com.br/v1/produto_imagem/?produto=" . $value->id . "&format=json&chave_api=" . env('PRODUCTS_REVIVA_CHAVE_API') . "&chave_aplicacao=" . env('PRODUCTS_REVIVA_CHAVE_APP'));
			$dataImagem = json_decode($json);


			$imagemPrincipal = array_filter(
				$dataImagem->objects,
					function ($e) {
						return $e->principal == true;
					}
				);

			if (isset($imagemPrincipal[0])) {
				$imagemUrl = "https://cdn.awsli.com.br/600x1000/" . $imagemPrincipal[0]->caminho;
			}

			$data = [
						'categoria'		=> 'brinquedo',
						'titulo'		=> $value->nome,
						'descricao'		=> strip_tags($value->descricao_completa),
						'preco'			=> preg_replace('/[^0-9.,]/', '', $dataPreco->cheio),
						'preco_venda'	=> preg_replace('/[^0-9.,]/', '', isset($dataPreco->promocional) ? $dataPreco->promocional : $dataPreco->cheio),
						'imagem'		=> $imagemUrl,
						'tipo_id'		=> $tipo->id
					];

			$produto = Produtos::updateOrCreate(['codigo' => $value->id], $data);
		};
	}

	private function produtosPanda()
	{
		$xml = XmlParser::load(env('PRODUCTS_PANDA_XML'));
 
		$feed = $xml->rebase('channel')->parse([
					'items'		=> ['uses' => 'item[title,description]'],
					'values'	=> ['uses' => 'item/g[id,price,sale_price,image_link,brand,product_type]'],
				]);
		
		$result = array_replace_recursive($feed['items'], $feed['values']);
		foreach ($result as $key => $value) {
			$tipo 	= ProdutosTipos::firstOrCreate(['nome' => $value['product_type']]);
			$marca 	= ProdutosMarcas::firstOrCreate(['nome' => $value['brand']]);
			$data 	= [
						'categoria'		=> 'brinquedo',
						'titulo'		=> $value['title'],
						'descricao'		=> strip_tags($value['description']),
						'preco'			=> preg_replace('/[^0-9.,]/', '', $value['price']),
						'preco_venda'	=> preg_replace('/[^0-9.,]/', '', $value['sale_price']),
						'imagem'		=> $value['image_link'],
						'tipo_id'		=> $tipo->id,
						'marca_id'		=> $marca->id
					];

			$produto = Produtos::updateOrCreate(['codigo' => $value['id']], $data);

			$produto->lojas()->delete();
			$produto->lojas()->create([
				'nome' => 'Panda Brinquedos',
				'link' => NULL
			]);
		}

		return response()
			->json(['response' => 'Importação realizada com sucesso.']);
	}  

	public function presentesAdicionar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::findOrFail($request->festa);
		$cliente = Clientes::findOrFail(session('client_id'));
		$produto = Produtos::findOrFail($request->produto);

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$festa->produto()->attach($produto);
	}

	public function presentesRemover(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festa);
		$cliente = Clientes::find(session('client_id'));

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$festa->produto()->detach($request->produto);
	}

	public function presentesReservar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festaProduto = FestasProdutos::where('produtos_id', $request->produtos_id)
									->where('festas_id', $request->festas_id);

		if ($festaProduto->count() == 0) {
			abort(403, 'Unauthorized action.');
		}

		$festaProduto->update($request->all());
		return response()
			->json(['response' => 'Reserva efetuada com sucesso.']);
	}

	public function categoriasAdicionar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festa);
		$cliente = Clientes::find(session('client_id'));
		$tipo = ProdutosTipos::find($request->tipo);

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		if ($request->status == "1") {
			$festa->tipo()->attach($tipo);
		} else {
			$festa->tipo()->detach($request->tipo);
		}
	}

	public function festasAtivar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festa);
		$cliente = Clientes::find(session('client_id'));

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$festa->update([
			'ativo' => $request->ativar
		]);
	}

	public function festasRemover(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		if (!session('client_id')) {
			abort(403, 'Unauthorized action. Client not logged.');
		}

		$festa = Festas::find($request->festa);
		$cliente = Clientes::find(session('client_id'));

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$festa->delete();

		return response()
			->json(['success' => true, 'redirectTo' => route('usuario.meus-aniversarios') ]);
	}

	public function listaAdicionar(StoreList $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festas_id);
		$cliente = Clientes::find(session('client_id'));
		$retorno = [];

		if (!$cliente) {
			abort(403, 'Unauthorized action.');
		}

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$retorno[] = $festa->lista()->firstOrCreate($request->all());

		return response()
			->json(['lista' => $retorno, 'total' => $festa->lista()->count() ]);
	}

	public function listaRemover(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$lista = FestasLista::findOrFail($request->id);
		$cliente = Clientes::find(session('client_id'));

		if ($lista->festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$lista->delete();

		return response()
			->json(['total' => $lista->count() ]);
	}

	public function listaImportar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festas_id);
		$cliente = Clientes::find(session('client_id'));
		$retorno = [];

		if (!$cliente) {
			abort(403, 'Unauthorized action.');
		}

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		if (empty($request->file('arquivos'))) {
			abort(400, 'Nenhum arquivo foi enviado.');
		}

		$content = \File::get($request->file('arquivos'));
		foreach (explode("\n", $content) as $key => $email){
			$retorno[] = $festa->lista()->firstOrCreate([
				'email' => $email
			])->toArray();
		}

		return response()
			->json(['lista' => $retorno, 'total' => $festa->lista()->count() ]);
	}

	public function listaAntiga(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$cliente = Clientes::find(session('client_id'));

		if (!$cliente) {
			abort(403, 'Unauthorized action.');
		}

		$lista = explode(',', $request->lista);
		$festas = Festas::whereIn('id', $lista)->get();

		return response()
			->json(['festas' => $festas ]);
	}

	public function listaAntigaImportar (Request $request) {
		$listaImportar = Festas::findOrFail($request->lista);
		$festa = Festas::findOrFail($request->festas_id);
		$cliente = Clientes::find(session('client_id'));
		$retorno = [];

		if (!$cliente) {
			abort(403, 'Unauthorized action.');
		}

		if ($listaImportar->clientes_id != $cliente->id || $festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		foreach ($listaImportar->lista as $key => $item){
			$retorno[] = $festa->lista()->firstOrCreate([
				'email' => $item->email
			])->toArray();
		}

		return response()
			->json(['lista' => $retorno, 'total' => $festa->lista()->count() ]);
	}

	public function cotasRemover (Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::findOrFail($request->festas_id);
		$cliente = Clientes::find(session('client_id'));
		$retorno = [];

		if (!$cliente) {
			abort(403, 'Unauthorized action.');
		}

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$produto = Cotas::findOrFail($request->produto)->delete();
	}
}
