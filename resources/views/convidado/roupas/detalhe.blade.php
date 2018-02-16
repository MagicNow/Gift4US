@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent07.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-roupas', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'roupas'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Ver Detalhes</p>
								<div class="col-md-4">
									@if (!empty($product->imagem))
										<img src="{{ url('storage/products/' . $product->imagem) }}" class="gifts-item-image" width="100%">
									@endif
								</div>
								<div class="gifts-item-content col-md-8">
									<h5 class="gifts-item-title bgC">{{ $product->titulo }}</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value bgC">R$ {{ $product->preco_venda }}</p>
									@if (!empty($product->cor))
										<p class="gifts-item-color-description">Cor</p>
										<p class="gifts-item-color-value bgC">{{ $product->cor }}</p>
									@endif
									<div class="col-md-6">
										<a href="{{ route('convidado.roupas.index', $party->codigo) }}" class="my-birthday-create-button-small">Voltar para<br />a lista de Roupas</a>
									</div>
									<div class="col-md-6">
										<a href="{{ route('convidado.roupas.compraOnline', [$party->codigo, $product]) }}" class="my-birthday-create-button-small">Quero comprar online agora</a>
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
