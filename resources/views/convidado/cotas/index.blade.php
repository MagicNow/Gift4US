@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent06.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-cotas', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					@if (session('success') && !empty(session('message')))
						<div class="alert alert-success">{{ session('message') }}</div>
					@endif

					@if (session('success') && !empty(session('redirect')))
						<script type="text/javascript">
							window.open("{{ session('redirect') }}");
						</script>
					@endif
					<ul class="gifts-list" data-festa-id="{{ $party->id }}">
						@if (isset($products) && count($products) > 0)
							@foreach ($products as $cota)
								<li class="col-md-6 gifts-item gifts-item-lista" data-id="24">
									<div class="row">
										<div class="col-md-5">
											<a href="{{ route('convidado.cotas.detalhe', [ $party->codigo, $cota->id]) }}" target="_self"><img src="{{ url('storage/quotas/' . $cota->foto) }}" class="gifts-item-image" width="100%"></a>
										</div>
										<div class="gifts-item-content col-md-7">
											<h5 class="gifts-item-title">{{ $cota->nome }}</h5>
											<p class="gifts-item-price-description">Valor total do presente:</p>
											<p class="gifts-item-price-value">R$ {{ number_format($cota->valor_total, 2) }}</p>
											<p class="gifts-item-price-description">nº de cotas</p>
											<p class="gifts-item-price-value">{{ $cota->dividir_cota ? $cota->quantidade_cotas . ' cotas' : 'cota única' }}</p>
											@if ($cota->dividir_cota)
												<p class="gifts-item-price-description">Valor da cota para presente</p>
												<p class="gifts-item-price-value">R$ {{ number_format($cota->valor_total / $cota->quantidade_cotas, 2) }}</p>
											@endif
										</div>
									</div>
									<div class="gifts-item-buttons">
										<a href="{{ route('convidado.cotas.detalhe', [ $party->codigo, $cota->id]) }}" class="col-md-7 col-md-offset-5 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
									</div>
								</li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
