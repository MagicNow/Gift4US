@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_roupas.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<div class="gifts-box-number col-md-3 dados-container">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4>Lista de Roupas</h4>
							<img src="{{ asset('assets/site/images/presentinho-icone.png') }}"> <span class="gifts-box-number-header-total">0</span> selecionados
						</div>
					</div>
					<div class="gifts-box-number-middle">
						Ver lista<br>
						selecionados
					</div>
					<div class="gifts-box-number-footer">
						<button class="gifts-box-number-submit">Finalizar lista</button>
						<a href="{{ route('usuario.meus-aniversarios.novo', 5) }}" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<h4>Sugestões</h4>
					<ul class="gifts-list">
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
						<li class="col-md-6 gifts-item">
							<div class="row">
								<div class="col-md-5">
									<img src="{{ asset('assets/site/images/presente-camiseta.png') }}" class="gifts-item-image">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Camiseta - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Azul</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<button class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</button>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<button class="col-md-12 gifts-item-button-selected hidden">Selecionado</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
