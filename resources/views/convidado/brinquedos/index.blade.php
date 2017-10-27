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
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="ACESSÓRIOS" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">ACESSÓRIOS</p>
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
						
						<li class="col-md-6 gifts-item" data-id="1">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254428/adora-doll-pequeno-berco-adora-20603005-68061.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">ADORA DOLL-PEQUENO BERÇO ADORA 20603005</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 139.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="2">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254444/dtc-raspa-mix-super-cores-azul-3594-68077.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">DTC-RASPA MIX SUPER CORES azul 3594</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item" data-id="3">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254445/dtc-raspa-mix-super-cores-pink-3594-68078.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">DTC-RASPA MIX SUPER CORES pink 3594</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="4">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254446/dtc-raspa-mix-super-cores-roxo-com-tampa-rosa-3594-68079.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">DTC-RASPA MIX SUPER CORES roxo com tampa rosa 3594</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254447/dtc-raspa-mix-super-cores-laranja-e-amarelo-3594-68080.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">DTC-RASPA MIX SUPER CORES laranja e amarelo 3594</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="6">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254462/monster-high-brilha-no-escuro-fun-mh0861-68095.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">MONSTER HIGH-BRILHA NO ESCURO FUN MH0861</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 14.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="7">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254481/dermiwil-case-para-notebook-container-51424-68114.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">DERMIWIL-CASE PARA NOTEBOOK CONTAINER 51424</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="8">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254489/boa-forma-bolsa-cooler-boa-forma-estampa-de-onca-dmw-48562-68122.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">BOA FORMA-BOLSA COOLER BOA FORMA estampa de onça DMW 48562</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 99.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="9">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254490/capricho-bolsa-tote-p-paete-preto-dmw-48666-68123.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAPRICHO-BOLSA TOTE P paetê preto DMW 48666</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 169.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="10">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254491/boa-forma-necessaire-com-bolso-estampa-de-onca-dmw-48564-68124.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">BOA FORMA-NECESSAIRE COM BOLSO estampa de onça DMW 48564</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="11">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254492/capricho-necessaire-2-divisoes-pink-heart-dmw-48612-68125.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAPRICHO-NECESSAIRE 2 DIVISÕES pink heart DMW 48612</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 59.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="12">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254495/capricho-necessaire-paete-preto-dmw-48664-68128.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAPRICHO-NECESSAIRE paetê preto DMW 48664</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="13">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254497/boa-forma-mochila-boa-forma-g-estampa-de-onca-dmw-48563-68130.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">BOA FORMA-MOCHILA BOA FORMA G estampa de onça DMW 48563</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 189.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="14">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254508/guarda-brinquedos-e-porta-objetos-toy-story-zippy-toys-gfp05-68141.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">Guarda Brinquedos e Porta Objetos TOY STORY ZIPPY TOYS GFP05</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 49.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="15">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254516-2/pooh-cofrinho-infantil-daiwa-y-034-68149.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">POOH-COFRINHO INFANTIL DAIWA Y-034</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 9.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="16">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254523/planet-girls-garrafa-de-aco-600ml-dermiwil-60377-68156.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">PLANET GIRLS-GARRAFA DE AÇO 600ml DERMIWIL 60377</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 39.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="17">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254525/cars-garrafa-de-aluminio-mate-dermiwil-51399-68158.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CARS-GARRAFA DE ALUMINIO MATE DERMIWIL 51399</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 39.80</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="18">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254527/marie-kit-colher-e-garfo-daiwa-y-242-68160.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">MARIE-KIT COLHER E GARFO DAIWA Y-242</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 19.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="19">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254528/tinker-bell-kit-colher-e-garfo-daiwa-y-243-68161.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">TINKER BELL-KIT COLHER E GARFO DAIWA Y-243</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 19.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="20">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254531/monster-high-armario-monstruoso-fun-870352-68164.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">MONSTER HIGH-ARMÁRIO MONSTRUOSO FUN 870352</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 139.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="21">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254543/frozen-fone-de-ouvido-headphone-frozen-pop-multilaser-ph130-68176.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">FROZEN-FONE DE OUVIDO HEADPHONE FROZEN POP MULTILASER PH130</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 69.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="22">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254546/shiny-toys-relogio-carinho-rosa-059926-68179.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">SHINY TOYS-RELÓGIO CARINHO ROSA 059926</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 149.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="23">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254547/star-wars-radio-relogio-com-alarme-darth-vader-jazwares-stwr0001-68180.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">STAR WARS-RÁDIO RELÓGIO COM ALARME DARTH VADER JAZWARES STWR0001</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 299.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="24">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254548/hunter-telescopio-4-em-1-quick-switch-vh-5888-68181.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">HUNTER-TELESCÓPIO 4 em 1 QUICK-SWITCH VH-5888</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 249.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="25">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254553/marie-relogio-de-parede-daiwa-y-070-68186.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">MARIE-RELÓGIO DE PAREDE DAIWA Y-070</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 29.99</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="26">
							<div class="row">
								<div class="col-md-5">
									<img src="http://recursos.pandabrinquedos.com.br/Imagem/Produto/235/254555/cars-relogio-de-parede-daiwa-y-072-68188.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CARS-RELÓGIO DE PAREDE DAIWA Y-072</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 29.99</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="27">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r2.pandabrinquedos.com.br/Imagem/Produto/235/254557/marie-almofada-daiwa-y083-68190.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">MARIE-ALMOFADA Daiwa Y083</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 19.99</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="28">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254558/gremlins-boneco-hang-on-gizmo-vinyl-plush-gibi-f963-68191.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">GREMLINS-BONECO Hang-On Gizmo vinyl plush GIBI F963</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 29.99</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="29">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r3.pandabrinquedos.com.br/Imagem/Produto/235/254562/thundercats-thundertank-sunny-956-68195.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">THUNDERCATS-THUNDERTANK SUNNY 956</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 179.99</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="30">
							<div class="row">
								<div class="col-md-5">
									<img src="http://r1.pandabrinquedos.com.br/Imagem/Produto/235/254568/baby-alive-comida-para-boneca-hasbro-a8581-68201.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">BABY ALIVE-COMIDA PARA BONECA HASBRO A8581</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 39.89</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value"></p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ route('convidado.brinquedos.detalhe', $party) }}" class="col-md-6 gifts-item-button gifts-item-button-show">Ver detalhes</a>
								<button class="col-md-6 gifts-item-button gifts-item-button-select">Selecionar</button>
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
