<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Req;
use Auth;
use Illuminate\Http\Request;
use App\Models\Produtos;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Http\Requests\StoreAdminProducts;


class ProductsController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return redirect()->route('admin.login');
        }
    }

    public function index()
    {
        $section = 'produtos';
        $produtos = Produtos::orderBy('id','desc')->simplePaginate(30);

        return view('admin.produtos.list', compact('produtos', 'section'));
    }

    public function status($id,$status)
    {
        $entity = Produtos::findOrFail($id);
        
        $entity->status = $status;
        $entity->save();
        return Redirect::route('admin.products.index')->with('sucess', 'Registro alterado com sucesso!');;
    }

    public function create()
    {
        $section = 'produtos';
        return view('admin.produtos.create', compact('section'));
    }

    public function store(StoreAdminProducts $request)
    {
        $input = $request->all();
        if ($request->file('imagem')) {
            $image = \Image::make($_FILES['imagem']['tmp_name']);
            $image->fit(100, 100);
            $extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $filename = str_slug(pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME), '-') . '.' . $extension;
            $image->save('storage/products/' . $filename);
            $input['imagem'] = $filename;
        }

        $product = new Produtos($input);
        $product->save();

        return redirect()->route('admin.products.index')->with('status', 'Produto cadastrado com sucesso!');
    }

    public function destroy (Request $request) {
        Produtos::destroy($request->id);

        return redirect()->route('admin.products.index')->with('status', 'Produto removido com sucesso!');
    }
}