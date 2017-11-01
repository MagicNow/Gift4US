@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		<div class="sub-menu text-center">
			<a class="confirm-btn" href="#"><img src="{{ asset('assets/site/images/img-check-out.png') }}" alt="" /></a>
			<a class="gifts-btn active" href="#"><img src="{{ asset('assets/site/images/img-presente-in.png') }}" alt="" /></a>
			<a class="message-btn" href="#"><img src="{{ asset('assets/site/images/img-mensagem-out.png') }}" alt="" /></a>
			<a class="map-btn" href="#"><img src="{{ asset('assets/site/images/img-maps-out.png') }}" alt="" /></a>
		</div>
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent06.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
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
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Valor total do presente:</p>
									<p class="gifts-item-price-value">R$ 4.000,00</p>
									<p class="gifts-item-price-description">nº de cotas</p>
									<p class="gifts-item-price-value">8 cotas</p>
									<p class="gifts-item-price-description">Valor da cota para presente</p>
									<p class="gifts-item-price-value">R$ 500,00</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.cotas.detalhe', $party) }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
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
