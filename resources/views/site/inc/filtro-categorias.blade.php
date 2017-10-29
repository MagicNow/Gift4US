<div class="gifts-filter col-md-12">
	<ul class="gifts-filter-categories">
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'brinquedos' ? 'active' : NULL }}">
			<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $party) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i>
				<span>brinquedos</span>
			</a>
		</li>
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'roupas' ? 'active' : NULL }}"">
			<a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $party) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-clothes"></i>
				<span>roupas</span>
			</a>
		</li>
		<li class="gifts-filter-categories-item {{ isset($filter) && $filter == 'cotas' ? 'active' : NULL }}"">
			<a href="{{ route('usuario.meus-aniversarios.presentes.cotas', $party) }}">
				<i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i>
				<span>cotas</span>
			</a>
		</li>
	</ul>
</div>