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
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent07.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-roupas', $party)

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
									<img src="{{ asset('assets/site/images/avatar/crianca-masculino.png') }}" class="form-birthday-avatar">
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
						@include('convidado.inc.filtro-categorias', ['filter' => 'roupas'])
					</div>
					<ul class="gifts-list" data-festa-id="{{ $party->id }}">
						@if (isset($products) && count($products) > 0)
							@foreach ($products as $product)
								<li class="col-md-6 gifts-item" data-id="1">
									<div class="row">
										<div class="col-md-5">
											@if (!empty($product->imagem))
												<img src="{{ $product->imagem }}" class="gifts-item-image" width="100%">
											@endif
										</div>
										<div class="gifts-item-content col-md-7">
											<h5 class="gifts-item-title">{{ $product->titulo }}</h5>
											<p class="gifts-item-price-description">Preço aproximado</p>
											<p class="gifts-item-price-value">R$ {{ $product->preco_venda }}</p>
											@if (!empty($product->cor))
												<p class="gifts-item-color-description">Cor</p>
												<p class="gifts-item-color-value">{{ $product->cor }}</p>
											@endif
										</div>
									</div>
									<div class="gifts-item-buttons">
										<a href="{{ route('convidado.roupas.detalhe', [$party->id, $product->id]) }}" class="col-md-7 col-md-offset-5 gifts-item-button gifts-item-button-show-cota">Ver detalhes</a>
									</div>
								</li>
							@endforeach
						@else
							Nenhum produto cadastrado
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
