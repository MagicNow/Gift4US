<?php

namespace App\Http\Controllers;

use App\Models\Festas;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
	public function aniversario(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.aniversario', compact('party'));
	}

	public function conviteDigital(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.convite-digital', compact('party'));
	}

	public function enviarEmail(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.enviar-email', compact('party'));
	}

	public function enviarConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.enviar-convite', compact('party'));
	}

	public function imprimirConvite(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.imprimir.convite', compact('party'));
	}

	public function imprimirListaPresentes(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.imprimir.lista-presentes', compact('party'));
	}

	public function imprimirPresencas(Request $request, $festa_id = null)
	{
		$party = Festas::find($festa_id);
		return view('notificacao.imprimir.presencas-confirmadas', compact('party'));
	}
}
