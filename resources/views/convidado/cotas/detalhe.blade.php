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
					<ul class="gifts-list" data-festa-id="{{ $party->id }}">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="{{ $product->id }}">
							<div class="row">
								<p class="gifts-item-title">Ver Detalhes</p>
								<div class="col-md-4">
									<img src="{{ url('storage/quotas/' . $product->foto) }}" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-8">
									<h5 class="gifts-item-title bgC">{{ $product->nome }}</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value bgC">R$ {{ number_format($product->valor_total, 2) }}</p>
									<p class="gifts-item-price-description">Número de cotas</p>
									<p class="gifts-item-price-value bgC">{{ $product->dividir_cota ? $product->quantidade_cotas . ' cotas' : 'cota única' }}</p>
									@if ($product->dividir_cota)
										<p class="gifts-item-price-description">Valor da cota para presente</p>
										<p class="gifts-item-price-value bgC">R$ {{ number_format($product->valor_total / $product->quantidade_cotas, 2) }}</p>
									@endif
									<div class="col-md-6">
										<a href="{{ route('convidado.cotas.index', $party->codigo) }}" class="my-birthday-create-button-small">Voltar para<br />a lista de COTAS</a>
									</div>
									<div class="col-md-6">
										<a href="#" class="my-birthday-create-button-small">Quero comprar online agora</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
