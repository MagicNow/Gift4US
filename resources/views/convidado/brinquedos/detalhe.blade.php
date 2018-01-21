@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent05.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-brinquedos', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Ver Detalhes</p>
								<div class="col-md-4">
									@if (!empty($product->imagem))
										<img src="{{ $product->imagem }}" class="gifts-item-image" width="100%">
									@endif
								</div>
								<div class="gifts-item-content col-md-8">
									<h5 class="gifts-item-title bgC">{{ $product->titulo }}</h5>
									<p class="gifts-item-price-description">Preço aproximado:</p>
									<p class="gifts-item-price-value bgC">R$ {{ $product->preco_venda }}</p>
									<p class="gifts-item-price-description">Observação</p>
									<p class="gifts-item-price-value bgC">{{ $product->descricao }}</p>
									<p class="gifts-item-price-description">Lojas disponiveis</p>
									@if ($product->lojas->count() > 0)
										@foreach ($product->lojas as $key => $loja)
											<p class="gifts-item-price-value bgC">{{ $loja->nome }}</p>
										@endforeach
									@endif

									<div class="{{ $product->adicionado == 0 ? 'col-md-6' : 'col-md-12' }}">
										<a href="{{ route('convidado.brinquedos.index', $party) }}" class="my-birthday-create-button-small">Voltar para<br />a lista de Brinquedos</a>
									</div>
									<div class="col-md-6 {{ $product->adicionado == 0 ?: 'hidden' }}">
										<a href="{{ route('convidado.brinquedos.compraOnline', [$party, $product]) }}" class="my-birthday-create-button-small">Quero comprar online agora</a>
									</div>
								</div>
								<div class="col-md-5" style="margin:0 0 0 320px">
									<a href="{{ route('convidado.brinquedos.reserva', [$party, $product]) }}" class="my-birthday-create-button-small">Quero dar este presente mas comprarei em loja física</a>
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
