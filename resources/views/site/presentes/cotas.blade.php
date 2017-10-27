@extends('site/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent13.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Cotas</h4>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total">99</span> selecionados
							</p>
						</div>
					</div>
					<div class="row"> 
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/lista?selecionados=1" class="gifts-box-number-middle toys col-md-12 dados-container" style="width:100%">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">selecionados</p>
						</a>
					</div>
					<div class="gifts-box-toys-add">
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/adicionar" class="dados-container">
							<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_add.png') }}" class="" alt="">
							<p class="gifts-box-toys-add-text">Adicionar cotas</p>
						</a>
						<p class="gifts-box-toys-add-legend">Lembrou de alguma cota que ficou faltando? Clique no botão acima para adionar mais cotas!</p>
					</div>
					<div class="gifts-box-number-footer dados-container">
						<a class="gifts-box-number-submit" href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/passo/5">Finalizar lista</a>
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						<div class="col-md-4 pL30">
							<h4 class="gifts-title">Lista de adicionados</h4>
						</div>
						<div class="gifts-filter col-md-8">
							<ul class="gifts-filter-categories">
								<li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i> <span>brinquedos</span></a></li><li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $party->id) }}"><i class="gifts-filter-categories-icon 
								gifts-filter-categories-clothes"></i> <span>roupas</span></a></li><li class="gifts-filter-categories-item active"><a href="#"><i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i> <span>cotas</span></a></li>
							</ul>
							<form method="get" action="#">
								@if ($request->selecionados)
									<input type="hidden" name="selecionados" value="1">
								@endif
								<div class="input-group gifts-filter-search pull-right" method="get">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="search" class="form-control gifts-filter-search-input" name="busca" placeholder="presente que está procurando" value="{{ $request->busca }}">
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
					<!-- MODAL ITEM -->
					<div class="modal-lista-item" style="display:none">
						<h6>Excluir este presente da sua lista</h6>
						<span>Você realmente deseja excluir este presente?</span>
						<ul class="gifts-list" data-festa-id="3">
							<li class="col-md-12 gifts-item " data-id="24">
								<div class="row">
									<div class="col-md-5">
										<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
									</div>
									<div class="gifts-item-content col-md-7">
										<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
										<p class="gifts-item-price-description">Valor total do presente:</p>
										<p class="gifts-item-price-value">R$ 4.000,00</p>
										<p class="gifts-item-price-description">nº de cotas</p>
										<p class="gifts-item-price-value">8 cotas</p>
										<p class="gifts-item-price-description">Valor da cota para presente</p>
										<p class="gifts-item-price-value">R$ 500,00</p>
									</div>
								</div>
								<div class="gifts-box-number-footer dados-container">
									<a class="gifts-box-number-submit col-md-6 pull-left" href="#">Excluir</a>
									<a class="gifts-box-number-submit col-md-6 pull-right" href="#">Cancelar</a>
								</div>
							</li>
						</ul>
					</div>
					<!-- MODAL -->
					<!-- MODAL CONCLUIR -->
					<div class="modal-lista-item modal-lista-concluir" style="display:none">
						<h6>Lista de Cotas</h6>
						<span>Parabéns! Você está perto de finalizar sua lista de cotas!</span>
						<p>
							<img src="http://vagrant.gift4us/public/assets/site/images/presentinho-icone.png">
							<small class="gifts-box-number-header-total">99</small> selecionados
						</p>
						<div class="gifts-box-number-footer dados-container">
							<a class="gifts-box-number-submit col-md-12" href="#">Concluir Lista</a>
						</div>
					</div>
					<!-- MODAL -->
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO DARTH VADER</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a class="col-md-6 gifts-item-button gifts-item-button-show" href="#">Ver detalhes</a>
								<a class="col-md-6 gifts-item-button gifts-item-button-select" href="#">Retirar da lista</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection