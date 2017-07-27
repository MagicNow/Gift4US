<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use App\Models\Produtos;
use App\Models\ProdutosTipos;
use App\Models\ProdutosMarcas;
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
						'titulo'		=> $value['title'],
						'descricao'		=> $value['description'],
						'preco'			=> $value['price'],
						'preco_venda'	=> $value['sale_price'],
						'imagem'		=> $value['image_link'],
						'tipo_id'		=> $tipo->id,
						'marca_id'		=> $marca->id
					];

			$produto = Produtos::updateOrCreate(['codigo' => $value['id']], $data);
		}

		return response()
			->json(['response' => 'Importação realizada com sucesso.']);
	}    
}
