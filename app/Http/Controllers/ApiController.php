<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use App\Models\Produtos;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ApiController extends Controller {


    public function produtos()
    {

        //$xml = simplexml_load_file("google.xml");
        //$xml = XmlParser::load(url("http://www.pandabrinquedos.com.br/xml/google.xml"));
        //$xml = XmlParser::load('http://www.pandabrinquedos.com.br/xml/google.xml');

        $xml = XmlParser::load("google.xml");
 
        $feed = $xml->rebase('channel')->parse([
            //'items'  => ['uses' => 'item[title,description]'],
            'items' => ['uses' => 'item[title,description]'],
            'values' => ['uses' => 'item/g[id,price,sale_price,image_link,brand,product_type]'],
        ]);
        
        $result = array_replace_recursive($feed['items'], $feed['values']);
        foreach ($result as $key => $value) {
            $produto = new Produtos;

            $produto->title         = $value['title'];
            $produto->description   = $value['description'];
            $produto->cod           = $value['id'];
            $produto->price         = $value['price'];
            $produto->sales_price   = $value['sale_price'];
            $produto->image         = $value['image_link'];
            $produto->brand         = $value['brand'];
            $produto->type          = $value['product_type'];

            $produto->save();
        }


    }

        
}
