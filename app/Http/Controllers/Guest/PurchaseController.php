<?php
namespace App\Http\Controllers\Guest;

use GuzzleHttp\Client;
use PagSeguro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller {
	public function status (Request $request) {
		$notificationType = $request->notificationType;
		$notificationCode = $request->notificationCode;

        $notification = PagSeguro::notification($notificationCode, $notificationType);

        echo '<pre>';
        print_r($notification);

		dd(simplexml_load_string($notification));
	}
}