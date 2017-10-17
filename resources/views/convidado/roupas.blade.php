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
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent07.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
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
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-6 gifts-categories-column">
								<div class="col-md-3 gifts-categories-item active" data-id="1">
									<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Conjuntinhos" width="70" class="gifts-categories-icon orange">
									<p class="gifts-categories-text">Conjuntinhos</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-9 dados-container">
					<div class="roupaMedidas" style="display:none">
						<div class="col-xs-12 col-sm-12">
							<div class="col-md-12">
								<a href="#" class="my-birthday-create-button-small">Não quer errar no presente? Aqui você pode<br />ver todas as medidas do aniversariante!</a>
							</div>
							<div class="row">
								<div class="col-md-7 form-birthday-size-column">
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-camiseta" class="form-birthday-size-label">Camiseta, regata, camisa e etc.</label>
										<select name="tamanho_camiseta" class="form-control form-birthday-size-input select2-hidden-accessible" id="aniver-tamanho-camiseta" tabindex="-1" aria-hidden="true">
											<option value="" disabled="">Clique para escolher o tamanho</option>
											<option value="PP">PP</option>
											<option value="P">P</option>
											<option value="M" selected="">M</option>
											<option value="G">G</option>
											<option value="GG">GG</option>
										</select>
										<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 298px;">
											<span class="selection">
												<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-aniver-tamanho-camiseta-container">
													<span class="select2-selection__rendered" id="select2-aniver-tamanho-camiseta-container" title="M">M</span>
													<span class="select2-selection__arrow" role="presentation">
														<b role="presentation"></b>
													</span>
												</span>
											</span>
											<span class="dropdown-wrapper" aria-hidden="true"></span>
										</span>
									</div>
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-calca" class="form-birthday-size-label">Calça, bermuda, shorts e etc.</label>
										<select name="tamanho_calca" class="form-control form-birthday-size-input select2-hidden-accessible" id="aniver-tamanho-calca" tabindex="-1" aria-hidden="true">
											<option value="" disabled="">Clique para escolher o tamanho</option>
											<option value="PP">PP</option>
											<option value="P">P</option>
											<option value="M">M</option>
											<option value="G" selected="">G</option>
											<option value="GG">GG</option>
										</select>
										<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 298px;">
											<span class="selection">
												<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-aniver-tamanho-calca-container">
													<span class="select2-selection__rendered" id="select2-aniver-tamanho-calca-container" title="G">G</span>
													<span class="select2-selection__arrow" role="presentation">
														<b role="presentation"></b>
													</span>
												</span>
											</span>
											<span class="dropdown-wrapper" aria-hidden="true"></span>
										</span>
									</div>
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-sapato" class="form-birthday-size-label">Sapato, chuteira, chinelo e etc.</label>
										<select name="tamanho_sapato" class="form-control form-birthday-size-input select2-hidden-accessible" id="aniver-tamanho-sapato" tabindex="-1" aria-hidden="true">
											<option value="" disabled="">Clique para escolher o tamanho</option>
											<option value="35" selected="">35</option>
											<option value="36">36</option>
											<option value="37">37</option>
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
										</select>
										<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 298px;">
											<span class="selection">
												<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-aniver-tamanho-sapato-container">
													<span class="select2-selection__rendered" id="select2-aniver-tamanho-sapato-container" title="35">35</span>
													<span class="select2-selection__arrow" role="presentation">
														<b role="presentation"></b>
													</span>
												</span>
											</span>
											<span class="dropdown-wrapper" aria-hidden="true"></span>
										</span>
									</div>
								</div>
								<div class="col-md-5">
									<img src="http://vagrant.gift4us/public/assets/site/images/avatar/crianca-masculino.png" class="form-birthday-avatar">
								</div>
							</div>
							<div class="form-group form-birthday-size-container">
								<label for="aniver-tamanho-calca" class="form-birthday-size-label">Observações gerais</label>
								<span class="select2 select2-container select2-container--default" dir="ltr" style="width:100%;display:block;">
									<span class="selection">
										<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-aniver-tamanho-sapato-container">
											<span class="select2-obs">A cor predileta do Heitor é azul.</span>
										</span>
									</span>
								</span>
							</div>
							<div class="col-md-12">
								<a href="#" class="my-birthday-create-button-small">Fechar</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="gifts-filter col-md-12">
							<ul class="gifts-filter-categories">
								<li class="gifts-filter-categories-item">
									<a href="{{ url('convidado/4/brinquedos') }}">
										<i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i>
										<span>brinquedos</span>
									</a>
								</li>
								<li class="gifts-filter-categories-item active">
									<a href="{{ url('convidado/4/roupas') }}">
										<i class="gifts-filter-categories-icon gifts-filter-categories-clothes"></i>
										<span>roupas</span>
									</a>
								</li>
								<li class="gifts-filter-categories-item">
									<a href="{{ url('convidado/4/cotas') }}">
										<i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i>
										<span>cotas</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
							</div>
							<span class="col-md-12 gifts-item-button-selected hidden">Selecionado <button class="gifts-item-button-remove"></button></span>
						</li>
						<li class="col-md-6 gifts-item " data-id="5">
							<div class="row">
								<div class="col-md-5">
									<img src="https://http2.mlstatic.com/camiseta-personalizada-vermelha-baby-looney-tunes-D_NQ_NP_686121-MLB20708538469_052016-F.jpg" class="gifts-item-image" width="100%">
								</div>
								<div class="gifts-item-content col-md-7">
									<h5 class="gifts-item-title">CAMISETA - Looney Tunes Frajola</h5>
									<p class="gifts-item-price-description">Preço aproximado</p>
									<p class="gifts-item-price-value">R$ 113,00</p>
									<p class="gifts-item-color-description">Cor</p>
									<p class="gifts-item-color-value">Vermelha</p>
								</div>
							</div>
							<div class="gifts-item-buttons">
								<a href="{{ url('convidado/4/roupasdetalhe') }}" class="col-md-12 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
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
