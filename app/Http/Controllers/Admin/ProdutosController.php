<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use URL;
use Auth;
use Request;
use App\Models\Produtos;
use Illuminate\Support\Facades\Input;
use Redirect;


class ProdutosController extends Controller
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
        $produtos = Produtos::orderBy('id','desc')->get();

        return view('admin.produtos.list',compact('produtos','section'));
    }

    public function status($id,$status)
    {
        $entity = Produtos::findOrFail($id);
        
        $entity->status = $status;
        $entity->save();
        return Redirect::route('admin.produtos')->with('sucess', 'Registro alterado com sucesso!');;
    }

    
}