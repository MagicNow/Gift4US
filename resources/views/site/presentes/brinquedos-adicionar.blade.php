@extends('site/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criar-presentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent12.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Brinquedos</h4>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total">99</span> selecionados
							</p>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total-add">03</span> adicionados
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
								<p class="gifts-item-title add-brinquedo">Adicionar brinquedo</p>
								<p class="gifts-item-price-description-cota bg-presente-lista">
									Adicionar presente é muito fácil! Só precisará preeencher algumas informações básicas descritas abaixo e inserir uma foto do produto e pronto! Ao salvar ele estará automaticamente na sua lista de adicionados.
								</p>
								<form class="row criar-presentes-form" action="" method="post" enctype="multipart/form-data">
									<div class="col-md-4">
										<p class="gifts-item-price-description-upload bgC">Adicionar imagem do produto</p>
										<input type="file" name="arquivos" class="upload-image"  accept="image/png, image/jpeg" />
									</div>
									<div class="gifts-item-content col-md-8">
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome do presente" aria-describedby="gifts-name" name="nome" maxlength="100" value="{{ old('nome') }}">
											<span class="input-group-addon" id="gifts-name"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Observação</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui alguma observação caso haja necessidade" aria-describedby="gifts-obs" maxlength="255" name="observacao" value="{{ old('observacao') }}">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Valor total</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="money form-control gifts-item-price-value bgC" placeholder="0,00" aria-describedby="gifts-total-price" name="valor_total" value="{{ old('valor_total') }}">
											<span class="input-group-addon" id="gifts-total-price"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Lojas disponíveis</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome da loja em que o produto encontra-se disponível" aria-describedby="gifts-obs" maxlength="255" name="lojas" value="{{ old('lojas') }}">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-value bgC textR"><a href="#">+ Adicionar outra loja</a></p>
										<div class="gifts-item-buttons">
											<button class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
											<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
											<button class="col-md-12 gifts-item-button gifts-item-button-select">Salvar e adicionar um novo presente</button>
										</div>
									</div>
								</form>
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
