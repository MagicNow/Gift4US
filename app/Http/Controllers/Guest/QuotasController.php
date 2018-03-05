<?php
namespace App\Http\Controllers\Guest;

use PagSeguro;
use App\Models\Festas;
use App\Models\Cotas;
use App\Models\CotasCompras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class QuotasController extends Controller {
	var $party;

	public function __construct(Request $request) {
		$this->middleware(function ($request, $next) {
			$this->party = Festas::where('codigo', $request->route('slug'))->firstOrFail();

			if ($this->party->ativo == 0 && session('client_id') !== $this->party->clientes_id) {
				abort(404, 'Página não encontrada.');
			}

			$this->quotas = $this->party->cotas();

			$totalBuyed = CotasCompras::whereIn('cotas_id', $this->quotas->pluck('id'))->count();

			$quotasTotal = $this->quotas->sum('quantidade_cotas');
			$this->quotasAvalible = Cotas::where('quantidade_cotas', '>', \DB::raw('(SELECT COUNT( cotas_compras.id ) FROM cotas_compras WHERE cotas_compras.cotas_id = cotas.id)'))
										->whereFestaId($this->party->id);

			$percent = $this->quotas->sum('quantidade_cotas') > 0 ? 100 - (round(($totalBuyed / $this->quotas->sum('quantidade_cotas')) * 100, 0, PHP_ROUND_HALF_EVEN)) : 0;
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id = null)
	{
		$party = $this->party;
		$products = $this->quotasAvalible;

		if ($request->busca) {
			$products = $products->where('nome', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$products = $products->orderBy('nome', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('nome', 'DESC');

					break;
				case 'maiorPreco':
					$products = $products->orderBy('valor_total', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('valor_total', 'ASC');
					break;
			}
		}

		$products = $products->get();

		return view('convidado.cotas.index', compact('request', 'party', 'products'));
	}

	public function detalhe(Request $request, $festa_id, $produto_id)
	{
		$party = $this->party;
		$product = Cotas::find($produto_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.cotas.detalhe', compact('request', 'party', 'product'));
	}

	public function mensagem(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.cotas.mensagem', compact('party'));
	}

	public function compraOnline(Request $request, $festa_id, $product_id)
	{
		$party = $this->party;
		$product = Cotas::find($product_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.cotas.compra-online', compact('request', 'party', 'product'));
	}

	public function compraOnlineSubmeter (Request $request, $festa_id, $cota_id) {
		$party = Festas::where('codigo', $festa_id)->first();
		$cota = Cotas::find($cota_id);

		if (!$party || !$cota) {
			abort(403, 'Unauthorized action.');
		}

		// $QuotasBuyed = CotasCompras::where('cotas_id', $cota->id);

		$phone = preg_replace('/[^0-9]/', '', $request->tel);

		$senderInfo = [
			'senderName' => $request->nome, //Deve conter nome e sobrenome
			'senderPhone' => $phone,
			'senderEmail' => $request->email,
			'senderHash' => $request->senderHash,
			'senderCPF' => $request->cpf //Ou CNPJ se for Pessoa Júridica
		];

		$price = $cota->dividir_cota == 0 ? $cota->valor_total : $cota->valor_total / $cota->quantidade_cotas;
		$items = [[
			'itemId' => $cota->id,
			'itemDescription' => $cota->nome,
			'itemAmount' => $price, //Valor unitário
			'itemQuantity' => '1', // Quantidade de itens
		]];

		$sendData = [
			'paymentMethod' => $request->changePaymentMethod
		];

		try {
			$orderNumber = \Token::UniqueNumber('cotas_compras', 'numero_pedido', 8 );
			$birthday = explode('/', $request->nascimento);

			$pagseguro = PagSeguro::setReference($orderNumber)
								->setSenderInfo($senderInfo)
								->setItems($items);

			if ($request->changePaymentMethod == 'creditCard') {
				$pagseguro->setCreditCardHolder([
								'creditCardHolderName' => $request->holderType == 'sameHolder' ? $request->nome : $request->creditCardHolderName, //Deve conter nome e sobrenome
								'creditCardHolderPhone' => $request->holderType == 'sameHolder' ? $request->tel : $request->creditCardHolderPhone, //Código de área enviado junto com o telefone
								'creditCardHolderCPF' => $request->holderType == 'sameHolder' ? $request->cpf : $request->creditCardHolderCPF, //Ou CNPJ se for Pessoa Júridica
								'creditCardHolderBirthDate' => $request->holderType == 'sameHolder' ? $request->nascimento : $request->creditCardHolderBirthDate,
							])
							->setBillingAddress([
								'billingAddressStreet' => $request->billingAddressStreet,
								'billingAddressNumber' => $request->billingAddressNumber,
								'billingAddressDistrict' => $request->billingAddressDistrict,
								'billingAddressPostalCode' => $request->billingAddressPostalCode,
								'billingAddressCity' => $request->billingAddressCity,
								'billingAddressState' => $request->billingAddressState
							]);

				$sendData['creditCardToken'] = $request->creditCardToken;
				$sendData['installmentQuantity'] = '1';
				$sendData['installmentValue'] = $price;

				$compra = $cota->compras()->create([
					'numero_pedido' => $orderNumber,
					'estado' => $request->billingAddressState,
					'cidade' => $request->billingAddressCity,
					'bairro' => $request->billingAddressDistrict,
					'complemento' => $request->billingAddressComplement,
					'numero' => $request->billingAddressNumber,
					'endereco' => $request->billingAddressStreet,
					'cep' => $request->billingAddressPostalCode,
					'final_cartao' => substr($request->cardNumber, -4),
					'nascimento' => count($birthday) >= 2 ? $birthday[2] . '-' . $birthday[1] . '-' . $birthday[0] : NULL,
					'cpf' => $request->cpf,
					'nome' => $request->nome,
					'email' => $request->email,
					'telefone' => $phone
				]);
			} else {
				$compra = $cota->compras()->create([
					'numero_pedido' => $orderNumber,
					'cpf' => $request->cpf,
					'nome' => $request->nome,
					'email' => $request->email,
					'telefone' => $phone
				]);
			}

			$pagseguro = $pagseguro->send($sendData);
			$compra->update([
				'pagamento_codigo' => (string) $pagseguro->code
			]);

			if ($request->changePaymentMethod == 'boleto') {
				$redirect = (string) $pagseguro->paymentLink;
				return redirect()->route('convidado.cotas.index', [ $festa_id ])
								->with('success', true)
								->with('redirect', $redirect);
			} else {
				return redirect()->route('convidado.cotas.index', [ $festa_id ])
								->with('success', true)
								->with('message', 'Parabéns, seu pagamento está em análise');
			}
		} catch(\Artistas\PagSeguro\PagSeguroException $e) {
			return redirect()->route('convidado.cotas.compraOnline', [ $festa_id, $cota_id ])
							->withErrors([
								'message' => $e->getMessage()
							])->withInput();
		}
	}
}