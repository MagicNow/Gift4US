@extends('convidado/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent03.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Brinquedos</h4>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total">2</span> selecionados
							</p>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total-add">0</span> adicionados
							</p>
						</div>
					</div>
					<div class="row"> 
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/lista?adicionados=1" class="gifts-box-number-middle toys dados-container col-md-6">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">adicionados</p>
						</a>
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/lista?selecionados=1" class="gifts-box-number-middle toys col-md-6 dados-container">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">selecionados</p>
						</a>
					</div>
					<div class="gifts-box-toys-add">
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/adicionar" class="dados-container">
							<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_add.png') }}" class="" alt="">
							<p class="gifts-box-toys-add-text">Adicionar brinquedos</p>
						</a>
						<p class="gifts-box-toys-add-legend">Adicione presentes que não achou na nossa lista de sugestões ao lado</p>
					</div>
					<div class="gifts-box-number-footer dados-container">
						<a class="gifts-box-number-submit" href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/passo/5">Finalizar lista</a>
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Ver Detalhes</p>
								<div class="col-md-4">
									<img src="http://www.pontofrio-imagens.com.br/brinquedos/BlocosdeMontar/Lego/8833974/647472444/LEGO---Mascotes-Olimpiadas-Rio-2016---Tom-e-Vinicius---40225-8833974.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-8">
									<p class="gifts-item-price-description">Como nosso portal é colaborativo, caso tenha alguma informação desatualizada você poderá atualizá-la clicando no botão de edição ao final de cada linha.</p>
									<h5 class="gifts-item-title bgC">LEGO Mascotes Olimpíadas Rio 2016 - Tom e Vincíus<a href="#" class="bt-editar">Editar</a></h5>
									<p class="gifts-item-price-description">Preço aproximado:</p>
									<p class="gifts-item-price-value bgC">R$ 49,00<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-description">Observação</p>
									<p class="gifts-item-price-value bgC">Para crianças maiores de 7 anos<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-description">Lojas disponiveis</p>
									<p class="gifts-item-price-value bgC">PBKids<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-value bgC">Americanas<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-value bgC">Submarino<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-value bgC">B-Mart<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-value bgC">Hi-Happy<a href="#" class="bt-editar">Editar</a></p>
									<div class="gifts-item-buttons">
										<button class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
										<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
										<button class="col-md-12 gifts-item-button gifts-item-button-select">Salvar e adicionar um novo presente</button>
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
