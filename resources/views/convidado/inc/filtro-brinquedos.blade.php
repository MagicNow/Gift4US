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
		@if($party->tipo && count($party->tipo) > 0)
			@foreach($party->tipo as $categoria)
				<li>
					<div class="col-md-6 gifts-categories-column">
						<div class="col-md-3 gifts-categories-item active" data-id="1">
							<img src="{{ asset('assets/site/images/img-presente-out.png') }}" alt="Jogos Tabuleiro" width="70" class="gifts-categories-icon orange">
							<p class="gifts-categories-text">{{ $categoria->nome }}</p>
						</div>
					</div>
				</li>
			@endforeach
		@endif
	</ul>
</div>