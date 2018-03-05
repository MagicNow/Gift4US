<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use DB;
use URL;
use Auth;
use Session;
use Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Mail;

class SalesController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return redirect()->route('admin.login');
        }
    }

    public function index(Request $request)
    {
        $section = 'sales';

        $cotas = DB::table('cotas_compras')
                    ->select(DB::raw("'cota' AS tipo, cotas.nome AS presente_nome, FORMAT((cotas.valor_total / cotas.quantidade_cotas), 2) AS valor_venda, cotas_compras.nome AS convidado_nome, cotas_compras.email AS convidado_email, cotas_compras.pagamento_status AS status, pagamento_codigo"))
                    ->join('cotas', 'cotas.id', 'cotas_compras.cotas_id')
                    ->orderBy('cotas_compras.updated_at', 'DESC');

        $sales = DB::table('festas_produtos')
                    ->select(DB::raw("produtos.categoria AS tipo, produtos.titulo AS presente_nome, produtos.preco_venda AS valor_venda, festas_produtos.nome AS convidado_nome, festas_produtos.email AS convidado_email, festas_produtos.pagamento_status AS status, pagamento_codigo"))
                    ->join('produtos', 'produtos.id', 'festas_produtos.produtos_id')
                    ->whereNotNull('festas_produtos.numero_pedido')
                    ->orderBy('festas_produtos.updated_at', 'DESC')
                    ->union($cotas)
                    ->get()
                    ->toArray();

        $page = isset($request->page) ? $request->page : 1;
        $paginate = 20;
        $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = array_slice($sales, $offSet, $paginate, true);
        $sales = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($sales), $paginate, $page);

        return view('admin.vendas.list',compact('sales', 'section'));
    }
}