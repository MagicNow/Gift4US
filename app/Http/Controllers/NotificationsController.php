<?php

namespace App\Http\Controllers;

use App\Models\Festas;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
	public function aniversario(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoaniversario', compact('party'));
	}
	public function imprimirConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoimprimirconvite', compact('party'));
	}
	public function conviteDigital(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoconvitedigital', compact('party'));
	}
	public function enviarEmail(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoenviaremail', compact('party'));
	}
	public function enviarConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('convidado.notificacaoenviarconvite', compact('party'));
	}
}
