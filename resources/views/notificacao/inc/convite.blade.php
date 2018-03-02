<div class="col-md-11">
	<div class="convite">
		<div class="header-convite">
			@if (!empty($party->foto))
				<img src="{{ asset('assets/site/images/bg-header-convite.png') }}" alt="Festa">
				<div class="header-convite-foto" style="background-image: url({{ asset('storage/birthdays/' . $party->foto) }})"></div>
			@endif
			<p>
				Festa de {{ isset($party->idade_anos) && $party->idade_anos > 0 ? $party->idade_anos . ' anos' : NULL }} {{ isset($party->idade_meses) && $party->idade_meses > 0 ? $party->idade_meses . ' meses' : NULL }} de<br /><span>{{ $party->nome }}</span>
			</p>
		</div>
		<div class="clearfix">
			<div class="col-md-4 col-xs-4">
				<div class="passos">
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
						<span>confira a lista de presentes {{ $party->confirma_presenca === 0 ? '' : 'e confirme sua presença' }}</span>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-xs-8">
				<div class="row convite-content">
					<div class="data-festa">
						<span>{{ sprintf('%02d', $party->festa_dia) }}/{{ sprintf('%02d', $party->festa_mes) }}/{{ $party->festa_ano }} {{ sprintf('%02d', $party->festa_hora) }}h{{ sprintf('%02d', $party->festa_minuto) }}</span>
					</div>
					<div class="local-festa">
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
		</div>
	</div>
</div>