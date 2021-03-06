@extends('site/master')

@section('content')
	<div class="gifts-modal hidden">
		<div class="gifts-modal-content col-md-3 col-md-offset-5">
			<h3 class="gifts-modal-title">Excluir este presente da sua lista</h3>
			<p class="gifts-modal-subtitle">Você realmente deseja excluir este presente?</p>
			<div class="gifts-modal-frame row"></div>
			<div class="gifts-modal-buttons">
				<button class="gifts-modal-button gifts-modal-button-remove">Excluir</button>
				<button class="gifts-modal-button gifts-modal-button-cancel">Cancelar</button>
			</div>
		</div>
	</div>
	@include('site.inc.modal-roupas-finalizar')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_roupas.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3 move">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Roupas</h4>
							<p><img src="{{ asset('assets/site/images/presentinho-icone.png') }}"> <span class="gifts-box-number-header-total">{{ count($selected) }}</span> selecionados</p>
						</div>
					</div>
					@if ($request->selecionados)
						<a href="{{ route('usuario.meus-aniversarios.presentes.roupas', [ $party->id ]) }}" class="gifts-box-number-middle dados-container">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">sugestões</p>
						</a>
					@else
						<a href="{{ route('usuario.meus-aniversarios.presentes.roupas', [ $party->id, 'selecionados' => 1 ]) }}" class="gifts-box-number-middle dados-container">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">selecionados</p>
						</a>
					@endif
					<div class="gifts-box-number-footer dados-container">
						<a class="gifts-box-number-submit btn-modal-finalizar" href="#">Finalizar lista de roupas</a>
						<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						<div class="col-md-4">
							<h4 class="gifts-title">Sugestões</h4>
						</div>
						<div class="gifts-filter col-md-8">
							<ul class="gifts-filter-categories">
								<li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i> <span>brinquedos</span></a></li><li class="gifts-filter-categories-item active"><a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $party->id) }}"><i class="gifts-filter-categories-icon 
								gifts-filter-categories-clothes"></i> <span>roupas</span></a></li><li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.cotas', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i> <span>cotas</span></a></li>
							</ul>
							<form method="get" action="#">
								@if ($request->selecionados)
									<input type="hidden" name="selecionados" value="1">
								@endif
								<div class="input-group gifts-filter-search pull-right" method="get">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="search" class="form-control gifts-filter-search-input" name="busca" placeholder="presente que está procurando" value="{{ $request->busca }}">
									<input type="submit" name="buscar" class="gifts-filter-search-submit pull-right" value="Ir">
								</div>
								<div class="gifts-filter-select-container pull-right">
									<select class="gifts-filter-select" name="ordenacao">
										<option value=""></option>
										<option value="maiorPreco" {{ $request->ordenacao == 'maiorPreco' ? 'selected' : '' }}>Maior preço</option>
										<option value="menorPreco" {{ $request->ordenacao == 'menorPreco' ? 'selected' : '' }}>Menor preço</option>
										<option value="AZ" {{ $request->ordenacao == 'AZ' ? 'selected' : '' }}>A-Z</option>
										<option value="ZA" {{ $request->ordenacao == 'ZA' ? 'selected' : '' }}>Z-A</option>
										<option value="MaisVendidos" {{ $request->ordenacao == 'MaisVendidos' ? 'selected' : '' }}>Mais vendidos</option>
										<option value="Lancamentos" {{ $request->ordenacao == 'Lancamentos' ? 'selected' : '' }}>Lançamento</option>
									</select>
								</div>
							</form>
						</div>
					</div>
					<ul class="gifts-list" data-festa-id="{{ $party->id }}">
						@if(!isset($_COOKIE['closeModalClothes']) || empty($_COOKIE['closeModalClothes']))
							<div class="gifts-list-message">
								<button class="gifts-list-message-remove" data-cookie="closeModalClothes"></button>
								<p class="gifts-list-message-first">Selecione as roupas que possuam a personalidade do aniversariante! É bem fácil! Você pode selecionar os produtos sugeridos abaixo, procurar algum modelo específico pelo nome e filtrar por diversas formas! </p>
								<p class="gifts-list-message-secound">*As roupas adquiridas pelos convidados serão convertidas em crédito na sua conta bancária. Não cadastrou sua conta bancária ainda? Não esqueça de cadastra-la a qualquer momento no painel de controle assim que finalizar a criação do aniversário.</p>
							</div>
						@endif

						@if (isset($products) && count($products) > 0)
							@foreach ($products as $product)
								<li class="col-md-6 gifts-item gifts-item-roupas gifts-item-lista {{ in_array($product->id, $selected) ? 'selected' : '' }}" data-id="{{ $product->id }}">
									<div class="row">
										<div class="col-md-5">
											@if (!empty($product->imagem))
												<img src="{{ $product->imagem }}" class="gifts-item-image">
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
										<button class="col-md-12 gifts-item-button gifts-item-button-select">Selecionar</button>
									</div>
									<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
								</li>
							@endforeach
							<div class="products-pagination text-center"> 
								{{ $products->links() }}
							</div>
						@else
							Nenhum produto cadastrado
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
