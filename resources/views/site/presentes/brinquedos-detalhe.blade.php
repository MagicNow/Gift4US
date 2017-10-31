@extends('convidado/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedos-lista criar-presentes">
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
						<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', [ $party->id, 'adicionados' => 1 ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">adicionados</p>
						</a>
						<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', [ $party->id, 'selecionados' => 1 ]) }}" class="gifts-box-number-middle toys col-md-6 dados-container">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">selecionados</p>
						</a>
					</div>
					<div class="gifts-box-toys-add">
						<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.adicionar', $party->id) }}" class="dados-container">
							<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_add.png') }}" class="" alt="">
							<p class="gifts-box-toys-add-text">Adicionar brinquedos</p>
						</a>
						<p class="gifts-box-toys-add-legend">Adicione presentes que não achou na nossa lista de sugestões ao lado</p>
					</div>
					<div class="gifts-box-number-footer dados-container">
						<a class="gifts-box-number-submit" href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}">Finalizar lista</a>
						<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="gifts-box-number-back">voltar a etapa anterior</a>
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
									<p class="gifts-item-price-description gifts-item-price-description-detalhe-brinquedo">Como nosso portal é colaborativo, caso tenha alguma informação desatualizada você poderá atualizá-la clicando no botão de edição ao final de cada linha.</p>
									<form class="row criar-presentes-form" action="{{ route('usuario.meus-aniversarios.presentes.cotas.submeter', $party->id) }}" method="post" enctype="multipart/form-data">
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC textB" aria-describedby="gifts-name" name="nome" maxlength="100" value="LEGO Mascotes Olimpíadas Rio 2016 - Tom e Vincíus">
											<span class="input-group-addon" id="gifts-name"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Preço aproximado:</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="money form-control gifts-item-price-value bgC" aria-describedby="gifts-total-price" name="valor_total" value="49,00">
											<span class="input-group-addon" id="gifts-total-price"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Observação</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="observacao" value="Para crianças maiores de 7 anos">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Lojas disponiveis</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="PBKids">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="Americanas">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="Submarino">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="B-Mart">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="Hi-Happy">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<div class="gifts-item-buttons">
											<button class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
											<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
											<button class="col-md-12 gifts-item-button gifts-item-button-select">Salvar e adicionar um novo presente</button>
										</div>
									</form>
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
