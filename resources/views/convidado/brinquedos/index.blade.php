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
					<ul class="gifts-list" data-festa-id="{{ $party->id }}">
						@if (isset($products) && count($products) > 0)
							@foreach ($products as $product)
								<li class="col-md-6 gifts-item gifts-item-lista" data-id="1">
									<div class="row">
										<div class="col-md-5">
											@if (!empty($product->imagem))
												<a href="{{ route('convidado.brinquedos.detalhe', [$party->codigo, $product->id]) }}" target="_self"><img src="{{ $product->imagem }}" class="gifts-item-image" width="100%"></a>
											@endif
										</div>
										<div class="gifts-item-content col-md-7">
											<h5 class="gifts-item-title">{{ $product->titulo }}</h5>
											<p class="gifts-item-price-description">Preço aproximado</p>
											<p class="gifts-item-price-value">R$ {{ $product->preco_venda }}</p>
											@if (!empty($product->cor))
												<p class="gifts-item-color-description">Cor</p>
												<p class="gifts-item-color-value">{{ $product->cor }}</p>
											@endif
										</div>
									</div>
									<div class="gifts-item-buttons">
										<a href="{{ route('convidado.brinquedos.detalhe', [$party->codigo, $product->id]) }}" class="col-md-7 col-md-offset-5 gifts-item-button">Ver detalhes</a>
									</div>
								</li>
							@endforeach
						@else
							Nenhum produto cadastrado
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
@endsection