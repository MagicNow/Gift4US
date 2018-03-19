@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			@include('notificacao.inc.modal-recados')
			@include('notificacao.inc.modal-presentes')
			@include('notificacao.inc.modal-presencas')
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent11.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">

			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-4">
					@include('notificacao.inc.menu')
				</div>
				<div class="col-md-8 dados-container">
					<div class="clearfix">
						<div class="col-md-offset-1 clearfix col-md-10 text-right social-back-home">
							<a href="{{ route('usuario.meus-aniversarios') }}">Home</a>
						</div>
						<div class="col-md-offset-1 social clearfix col-md-10">
							<div class="clearfix text-right">
								<a href="{{ route('notificacoes.imprimir.convite', $party->id) }}" target="_blank" class="col-md-5 social-button"><span class="convites-texto">Imprimir convite <svg version="1.0" class="social-button-print-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="25" viewBox="0 0 56.000000 51.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,51.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none"><path d="M110 455 l0 -55 170 0 170 0 0 55 0 55 -170 0 -170 0 0 -55z"/> <path d="M25 345 c-23 -22 -25 -31 -25 -125 l0 -100 55 0 55 0 0 -55 0 -55 170 0 170 0 0 55 0 55 55 0 55 0 0 90 c0 95 -14 142 -45 154 -9 3 -118 6 -241 6 l-225 0 -24 -25z m473 -57 c-2 -15 -10 -23 -23 -23 -13 0 -21 8 -23 23 -3 18 1 22 23 22 22 0 26 -4 23 -22z m-108 -158 l0 -70 -110 0 -110 0 0 70 0 70 110 0 110 0 0 -70z"/></g></svg></span></a>

								<div class="col-md-6 social-button col-md-offset-1">
									<span class="convites-texto">Enviar convites</span>
									<a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar email">E-mail</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar fb">Facebook</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar whats">Whatsapp</a>
								</div>
							</div>
						</div>
					</div>
					@include('notificacao.inc.convite')
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
