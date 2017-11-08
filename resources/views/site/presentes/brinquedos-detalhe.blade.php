@extends('site/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedos-lista criar-presentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent03.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.filtro-brinquedos')

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('site.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Ver Detalhes</p>
								<div class="col-md-4">
									<img src="{{ $product->imagem }}" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-8">
									<p class="gifts-item-price-description gifts-item-price-description-detalhe-brinquedo">Como nosso portal é colaborativo, caso tenha alguma informação desatualizada você poderá atualizá-la clicando no botão de edição ao final de cada linha.</p>
									<form class="row criar-presentes-form edit-form-pencil" action="{{ route('usuario.meus-aniversarios.presentes.cotas.submeter', $party->id) }}" method="post" enctype="multipart/form-data">
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
