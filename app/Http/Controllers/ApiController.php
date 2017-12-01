<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use App\Models\Produtos;
use App\Models\ProdutosTipos;
use App\Models\ProdutosMarcas;
use App\Models\Clientes;
use App\Models\Festas;
use App\Models\FestasProdutos;
use App\Models\FestasLista;
use App\Http\Requests\StoreList;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ApiController extends Controller {
	public function produtos()
	{
		$xml = XmlParser::load(env('PRODUCTS_XML'));
 
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
		}

		return response()
			->json(['response' => 'Importação realizada com sucesso.']);
	}  

	public function presentesAdicionar(Request $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festa);
		$cliente = Clientes::find(session('client_id'));
		$produto = Produtos::find($request->produto);

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

	public function listaAdicionar(StoreList $request) {
		if(!$request->ajax()) {
			abort(404, 'Page not found.');
		}

		$festa = Festas::find($request->festas_id);
		$cliente = Clientes::find(session('client_id'));
		$lista = $festa->lista();

		if ($festa->clientes_id != $cliente->id) {
			abort(403, 'Unauthorized action.');
		}

		$email = $lista->create($request->all());

		return response()
			->json(['id' => $email->id, 'email' => $request->email, 'total' => $lista->count() ]);
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
}
