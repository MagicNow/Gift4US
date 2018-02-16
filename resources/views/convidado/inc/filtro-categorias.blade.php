<div class="gifts-filter col-md-12">
	<ul class="gifts-filter-categories">
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'brinquedos' ? 'active' : NULL }}">
			<a href="{{ route('convidado.brinquedos.index', $party->codigo) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i>
				<span>brinquedos</span>
			</a>
		</li>
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'roupas' ? 'active' : NULL }}"">
			<a href="{{ route('convidado.roupas.index', $party->codigo) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-clothes"></i>
				<span>roupas</span>
			</a>
		</li>
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'cotas' ? 'active' : NULL }}"">
			<a href="{{ route('convidado.cotas.index', $party->codigo) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i>
				<span>cotas</span>
			</a>
		</li>
	</ul>
</div>