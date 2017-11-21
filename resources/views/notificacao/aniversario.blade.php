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
								<a href="#" class="convites-enviar email">E-mail</a><a href="#" class="convites-enviar fb">Facebook</a><a href="#" class="convites-enviar whats">Whatsapp</a>
							</div>
							<div class="col-md-4 text-right">
								<a href="{{ url()->previous() }}" class="btn-back">Voltar</a>
							</div>
						</div>
					</div>
					<div class="convite">
						<div class="header-convite">
							@if (!empty($party->foto))
								<img src="{{ asset('assets/site/images/bg-header-convite.png') }}" alt="Festa">
								<div class="header-convite-foto" style="background-image: url({{ asset('storage/birthdays/' . $party->foto) }})"></div>
							@endif
							<p>
								Festa de {{ isset($party->idade_anos) && $party->idade_anos > 0 ? $party->idade_anos . ' anos' : NULL }} {{ isset($party->idade_meses) && $party->idade_meses > 0 ? $party->idade_meses . ' meses' : NULL }} {{ $party->nome == 'masculino' ? 'do' : 'da' }}<br /><span>{{ $party->nome }}</span>
							</p>
						</div>
						<div class="passos pull-left">
							<div class="bg"></div>
							<div class="passo1">
								<div class="bg-presente">1</div>
								<span>entre no site www.gift4us.com</span>
							</div>
							<div class="passo2">
								<div class="bg-presente">2</div>
								<span>insira o aniversário ou o código <strong>{{ $party->codigo }}</strong></span>
							</div>
							<div class="passo3">
								<div class="bg-presente">3</div>
								<span>confira a lista de presentes e confirme sua presença</span>
							</div>
						</div>
						<div class="data-festa pull-right">
							<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }} {{ sprintf('%02d', $party->festa_hora) }}h{{ sprintf('%02d', $party->festa_minuto) }}</span>
						</div>
						<div class="local-festa pull-right">
							<div class="bg"></div>
							<div class="endereco">
								<h6>Onde?</h6>
								<h5>{{ $party->endereco }}</h5>
								<h5>Próximo a {{ $party->referencia }}</h5>
								@if (!empty($party->observacoes))
									<h6>Observações:</h6>
									<h5>{{ $party->observacoes }}</h5>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
