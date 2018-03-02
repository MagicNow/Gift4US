<form class="gifts-box-number col-md-3" action="{{ route('convidado.cotas.index', $party->codigo) }}" method="get">
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
		<span style="width:{{ $percent }}%"></span>
		<strong>{{ $percent }}% disponivel</strong>
	</div>
</form>