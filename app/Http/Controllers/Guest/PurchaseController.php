<?php
namespace App\Http\Controllers\Guest;

use GuzzleHttp\Client;
use PagSeguro;
use App\Models\CotasCompras;
use App\Models\FestasProdutos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller {
	public function status (Request $request) {
		$notificationType = $request->notificationType;
		$notificationCode = $request->notificationCode;

        $notification = PagSeguro::notification($notificationCode, $notificationType);

		$produto = FestasProdutos::where('pagamento_codigo', (string) $notification->code);

		if ($produto->count() == 0) {
			$produto = CotasCompras::where('pagamento_codigo', (string) $notification->code);
		}

		if ($produto->count() == 0) {
			abort(404, 'Compra não encontrada.');
		}

		$status = (string) $notification->status;
		$produto->update([
			'pagamento_status' => (string) $notification->status
		]);
		return response()
					->json(['status' => true]);
	}
}