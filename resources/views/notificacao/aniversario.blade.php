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
					<div class="social gifts-box-number-footer clearfix" style="width: 558px">
						<div class="convites-enviar-bg clearfix">
							<div class="col-md-8 text-right">
								<span class="convites-texto">Enviar convites</span>
								<a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar email">E-mail</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar fb">Facebook</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar whats">Whatsapp</a>
							</div>
							<div class="col-md-4 text-right">
								<a href="{{ url()->previous() }}" class="btn-back">Voltar</a>
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
