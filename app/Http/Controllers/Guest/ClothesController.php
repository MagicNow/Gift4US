<?php
namespace App\Http\Controllers\Guest;

use GuzzleHttp\Client;
use PagSeguro;
use App\Models\Festas;
use App\Models\Produtos;
use App\Models\FestasProdutos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ClothesController extends Controller {
	private $party;
	private $clothes;
	private $clothesAvalible;

	public function __construct(Request $request) {
		$this->middleware(function ($request, $next) {
			$this->party = Festas::where('codigo', $request->route('slug'))->firstOrFail();

			if ($this->party->ativo == 0 && session('client_id') !== $this->party->clientes_id) {
				abort(404, 'Página não encontrada.');
			}

			$this->clothes = $this->party
							   ->produto()
							   ->where('categoria', 'roupa');

			$clothesTotal = $this->clothes->count();
			$this->clothesAvalible = $this->clothes->whereNull('nome');
			
			$percent = $this->clothesAvalible->count() > 0 ? round(($this->clothesAvalible->count() * 100) / $clothesTotal, 0, PHP_ROUND_HALF_EVEN) : 0;
			view()->share('percent', $percent);

			return $next($request);
		});
	}

	public function index(Request $request, $festa_id = null)
	{
		$party = $this->party;
		$products = $this->clothesAvalible;

		if ($request->busca) {
			$products = $products->where('titulo', 'LIKE', '%' . $request->busca . '%');
		}

		if ($request->ordenacao) {
			switch ($request->ordenacao) {
				case 'AZ':
					$products = $products->orderBy('titulo', 'ASC');
					break;
				case 'ZA':
					$products = $products->orderBy('titulo', 'DESC');
					break;
				case 'maiorPreco':
					$products = $products->orderBy('preco_venda', 'DESC');
					break;
				case 'menorPreco':
					$products = $products->orderBy('preco_venda', 'ASC');
					break;
			}
		}

		$products = $products->get();

		return view('convidado.roupas.index', compact('request', 'party', 'products'));
	}

	public function mensagem(Request $request, $party_id)
	{
		$party = $this->party;
		return view('convidado.roupas.mensagem', compact('request', 'party'));
	}

	public function detalhe(Request $request, $party_id, $product_id)
	{
		$party = $this->party;
		$product = Produtos::find($product_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.roupas.detalhe', compact('request', 'party', 'product'));
	}


	public function compraOnline(Request $request, $festa_id, $product_id)
	{
		$party = $this->party;
		$product = Produtos::find($product_id);

		if (empty($product)) {
			abort(404, 'Página não encontrada.');
		}

		return view('convidado.roupas.compra-online', compact('request', 'party', 'product'));
	}

	public function compraOnlineSubmeter (Request $request, $festa_id, $product_id) {
		$party = Festas::where('codigo', $festa_id)->first();
		$product = Produtos::find($product_id);

		if (!$party || !$product) {
			abort(403, 'Unauthorized action.');
		}

		$partyProduct = FestasProdutos::where('produtos_id', $product->id)
										->where('festas_id', $party->id);;

		$phone = preg_replace('/[^0-9]/', '', $request->tel);

		$senderInfo = [
			'senderName' => $request->nome, //Deve conter nome e sobrenome
			'senderPhone' => $phone,
			'senderEmail' => $request->email,
			'senderHash' => $request->senderHash,
			'senderCPF' => $request->cpf //Ou CNPJ se for Pessoa Júridica
		];

		$items = [[
			'itemId' => $product->id,
			'itemDescription' => $product->titulo,
			'itemAmount' => $product->preco_venda, //Valor unitário
			'itemQuantity' => '1', // Quantidade de itens
		]];

		$sendData = [
			'paymentMethod' => $request->changePaymentMethod
		];

		try {
			$orderNumber = \Token::UniqueNumber('festas_produtos', 'numero_pedido', 8 );
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
				$sendData['installmentValue'] = $product->preco_venda;

				$partyProduct->update([
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
				$partyProduct->update([
					'numero_pedido' => $orderNumber,
					'cpf' => $request->cpf,
					'nome' => $request->nome,
					'email' => $request->email,
					'telefone' => $phone
				]);
			}

			$pagseguro = $pagseguro->send($sendData);

			if ($request->changePaymentMethod == 'boleto') {
				$success = true;
				$redirect = $pagseguro->paymentLink;
				// return redirect()->route('convidado.roupas.index', [ $festa_id ])
				// 				->with('success', 'redirect');
				header("Location: " . $redirect);
			} else {
				$success = true;
				$message = 'Parabéns, seu pagamento está em análise';
				return redirect()->route('convidado.roupas.index', [ $festa_id ])
								->with('success', 'message');
			}
		} catch(\Artistas\PagSeguro\PagSeguroException $e) {
			return redirect()->route('convidado.roupas.compraOnline', [ $festa_id, $product_id ])
							->withErrors([
								'message' => $e->getMessage()
							])->withInput();
		}
	}

	private function formatDate ($date) {
		$date = explode('/', $date);
		return $date[2] . '-' . $date[1] . '-' . $date[0];
	}
}