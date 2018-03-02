@extends('site/master')
@section('content')
	<div class="dashboard imprimir-convite-geral col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_convite.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-4">
					@include('notificacao.inc.menu')
				</div>
				<div class="col-md-7 dados-container dados-container-imprimirconvite">
					<div class="social col-md-12">
						<div class="gifts-box-number-footer">
							<div class="pull-left col-md-5">
								<a href="#" class="btn-print">Imprimir convite</a>
							</div>
							<div class="pull-right col-md-6">
								<a href="#" class="btn-invite">Voltar</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="detalhes-imprimir-festa">
						<p>Escolha abaixo o layout do convite que quer imprimir para os seus convidados</p>
					</div>
					<div class="pull-left zoom">
						<div class="detalhes-imprimir-festa">
							<h1>Convite complementar</h1>
							<p class="cm">6,5cm x 3,5 cm</p>
						</div>
						<center>
							<div class="convite-imprimirconvite">
								<img src="{{ asset('assets/site/images/logo-rodape.png') }}" class="imglogo">
								<div class="texto">
									<img src="{{ asset('assets/site/images/um.png') }}">
									<br/>
									<b>acesse:GIFT4US.COM.BR</b>
									<br/>
									<img src="{{ asset('assets/site/images/dois.png') }}">
									<br/>
									<span>Insira o nome do aniversariante
									ou o código {{ $party->codigo }}
									</span>
									<br/>
									<img src="{{ asset('assets/site/images/tres.png') }}">
									<br/>
									<span>{{ $party->confirma_presenca === 0 ? 'Encontre' : 'Confirme sua presença
									e encontre' }} a lista de presentes</span>
								</div>
							</div>
						</center>
						<div class="gifts-box-number-footer">
							<a href="#" class="gifts-box-number-submit imprimir-btn">IMPRIMIR</a>
						</div>
						<p class="detalhes-imprimir-festa">Cada folha formato A4 contém 24 convites</p>
					</div>
					<div class="pull-left zoom" style="border:none;">
						<div class="detalhes-imprimir-festa">
							<h1>Convite Gift4us</h1>
							<p class="cm">16 cm x 9 cm</p>
						</div>
						<div class="imprimir-zoom">
							<div class="imprimir-zoom convite">
								<div class="header-convite">
									<img src="{{ asset('assets/site/images/bg-header-convite.png') }}" alt="Festa">
									<div class="header-convite-foto" style="background-image: url({{ asset('storage/birthdays/' . $party->foto) }})"></div>
									<p>
										Festa de {{ isset($party->idade_anos) && $party->idade_anos > 0 ? $party->idade_anos . ' anos' : NULL }} {{ isset($party->idade_meses) && $party->idade_meses > 0 ? $party->idade_meses . ' meses' : NULL }} de<br /><span>{{ $party->nome }}</span>
									</p>
								</div>
								<div class="passos pull-left">
									<div class="bg"></div>
									<div class="passo1">
										<div class="bg-presente">1</div>
										<span>entre no site www.gift4us.com.br</span>
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
										@if (!empty($party->referencia))
											<h5>Próximo a {{ $party->referencia }}</h5>
										@endif
										@if (!empty($party->observacoes))
										<h6>Observações:</h6>
										<h5>{{ $party->observacoes }}</h5>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="gifts-box-number-footer">
							<a href="#" class="gifts-box-number-submit imprimir-btn">IMPRIMIR</a>
						</div>
						<p class="detalhes-imprimir-festa">Cada folha formato A4 contém 4 convites</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
@endsection