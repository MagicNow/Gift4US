@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="preview-header">
			<div class="preview-header-decor">
				<img src="{{ asset('assets/site/images/img-convidado-1.png') }}" alt="Festa" class="preview-banner-item-image">
				<img src="{{ asset('assets/site/images/img-convidado-heitor.png') }}" alt="Heitor" class="preview-banner-item-image preview-banner-item-foto">
			</div>
			<div class="preview-header-name">Heitor</div>
			<div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
		</div>
		<div class="sub-menu text-center">
			<a class="confirm-btn" href="#"><img src="{{ asset('assets/site/images/img-check-out.png') }}" alt="" /></a>
			<a class="gifts-btn active" href="#"><img src="{{ asset('assets/site/images/img-presente-in.png') }}" alt="" /></a>
			<a class="message-btn" href="#"><img src="{{ asset('assets/site/images/img-mensagem-out.png') }}" alt="" /></a>
			<a class="map-btn" href="#"><img src="{{ asset('assets/site/images/img-maps-out.png') }}" alt="" /></a>
		</div>
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent05.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="input-group gifts-filter-search pull-right" method="get">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="search" class="form-control gifts-filter-search-input" name="busca" placeholder="presente que está procurando" value="">
					</div>
					<div class="gifts-filter-select-container pull-right">
						<select class="gifts-filter-select select2-hidden-accessible" name="ordenacao" tabindex="-1" aria-hidden="true">
							<option value=""></option>
							<option value="maiorPreco">Maior preço</option>
							<option value="menorPreco">Menor preço</option>
							<option value="AZ">A-Z</option>
							<option value="ZA">Z-A</option>
							<option value="MaisVendidos">Mais vendidos</option>
							<option value="Lancamentos">Lançamento</option>
						</select>
						<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;">
							<span class="selection">
								<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ordenacao-3c-container">
									<span class="select2-selection__rendered" id="select2-ordenacao-3c-container">
										<span class="select2-selection__placeholder">ordenar por</span>
									</span>
									<span class="select2-selection__arrow" role="presentation">
										<b role="presentation"></b>
									</span>
								</span>
							</span>
							<span class="dropdown-wrapper" aria-hidden="true"></span>
						</span>
					</div>
					<div class="porcentagem">
						<span style="width:25%"></span>
						<strong>25% disponivel</strong>
					</div>
					<ul class="gifts-categories-list row" data-festa-id="3">
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos de Tabuleiro" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Jogos Tabuleiro</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Quero comprar online agora</p>
								<div class="col-md-4">
									<img src="http://www.pontofrio-imagens.com.br/brinquedos/BlocosdeMontar/Lego/8833974/647472444/LEGO---Mascotes-Olimpiadas-Rio-2016---Tom-e-Vinicius---40225-8833974.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-8">
									<h5 class="gifts-item-title bgC">LEGO<br />Mascotes Olimpíadas Rio 2016 - Tom e Vincíus</h5>
									<p class="gifts-item-price-description">Preço aproximado:</p>
									<p class="gifts-item-price-value bgC">R$ 49,00</p>
									<p class="gifts-item-price-description">Observação</p>
									<p class="gifts-item-price-value bgC">Para crianças maiores de 7 anos</p>
									<p class="gifts-item-price-description">Lojas disponiveis</p>
									<p class="linkLojaOnline">PBKids</p>
									<p class="linkLojaOnline">Americanas</p>
									<p class="linkLojaOnline">Submarino</p>
									<p class="linkLojaOnline" style="margin-right:0;">B-Mart</p>
									<p class="linkLojaOnline">Hi-Happy</p>
									<h5 class="col-md-12 gifts-item-title">Atenção</h5>
									<p class="col-md-12 gifts-item-price-description">Antes de sair, que tal avisar o aniversariante que irá dar este presente?<br />Preencha os campos abaixo para concluir!</p>
									<fieldset class="col-md-12 formOnline">
										<div class="form-group">
											<input type="text" name="nome" id="msg-nome" class="form-control form-input bgC" placeholder="nome">
										</div>
										<div class="form-group">
											<input type="text" name="e-mail" id="msg-nome" class="form-control form-input bgC" placeholder="E-mail">
										</div>
										<div class="form-group">
											<input type="text" name="rg" id="msg-nome" class="form-control form-input bgC" placeholder="RG">
										</div>
										<div class="form-group">
											<textarea name="mensagem" id="msg-mensagem" class="form-control form-input bgC" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
										</div>
										<p class="gifts-item-price-value">Atenção1: A partir do momento que você decidir dar este presente, ele será <cite>removido definitivamente da lista</cite> e não poderá mais ser escolhido por nenhum outro convidado da festa</p>
										<div class="col-md-2">
											<a href="#" class="my-birthday-create-button-small">Enviar</a>
										</div>
									</fieldset>
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
