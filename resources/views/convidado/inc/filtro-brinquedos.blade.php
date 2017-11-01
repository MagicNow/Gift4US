<form class="gifts-box-number col-md-3" action="{{ route('convidado.brinquedos.index', $party->id) }}" method="get">
	<div class="input-group gifts-filter-search pull-right" method="get">
		<span class="input-group-addon"><i class="fa fa-search"></i></span>
		<input type="search" class="form-control gifts-filter-search-input" name="busca" placeholder="presente que está procurando" value="{{ $request->busca }}">
	</div>
	<div class="gifts-filter-select-container text-right">
		<select class="gifts-filter-select" name="ordenacao">
			<option value=""></option>
			<option value="AZ" {{ $request->ordenacao == 'AZ' ? 'selected' : '' }}>A-Z</option>
			<option value="ZA" {{ $request->ordenacao == 'ZA' ? 'selected' : '' }}>Z-A</option>
			<option value="maiorPreco" {{ $request->ordenacao == 'maiorPreco' ? 'selected' : '' }}>Maior preço</option>
			<option value="menorPreco" {{ $request->ordenacao == 'menorPreco' ? 'selected' : '' }}>Menor preço</option>
		</select>
	</div>
	<div class="porcentagem">
		<span style="width:25%"></span>
		<strong>25% disponivel</strong>
	</div>
	<ul class="gifts-categories-list row" data-festa-id="{{ $party->id }}">
		@if($party->tipo && count($party->tipo) > 0)
			@foreach($party->tipo as $categoria)
				<li class="col-md-6 filter-categories-item" data-id="{{ $categoria->id }}">
					<input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" class="hidden filter-categories-input" id="filtro-categoria-{{ $categoria->id }}" {{ $request->categorias && in_array($categoria->id, $request->categorias) ? 'checked' : NULL }}>
					
					<label for="filtro-categoria-{{ $categoria->id }}" class="filter-categories-label">
						<img src="{{ asset('assets/site/images/passo_5_icone_presente_azul.png') }}" alt="{{ $categoria->nome }}" width="62" class="gifts-categories-icon red">
						<img src="{{ asset('assets/site/images/passo_5_icone_presente_laranja.png') }}" alt="{{ $categoria->nome }}" width="62" class="gifts-categories-icon orange">
						<p class="gifts-categories-text">{{ $categoria->nome }}</p>
					</label>
				</li>
			@endforeach
		@endif
	</ul>
</form>