<div class="gifts-box-number col-md-3">
	<div class="gifts-box-number-header row">
		<div class="col-md-11 col-md-offset-1">
			<h4 class="gifts-box-number-header-title">Lista de Brinquedos</h4>
			<p><img src="{{ asset('assets/site/images/presentinho-icone.png') }}"> <span class="gifts-box-number-header-total">{{ count($selected) }}</span> selecionados</p>
			<p><img src="{{ asset('assets/site/images/presentinho-icone.png') }}"> <span class="gifts-box-number-header-total-add">{{ count($add) }}</span> adicionados</p>
		</div>
	</div>
	<div class="row"> 
		@if ($request->adicionados)
			<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.lista', [ $party->id ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
				<p class="gifts-box-number-middle-view">Ver lista</p>
				<p class="gifts-box-number-middle-selected">sugestões</p>
			</a>
		@else
			<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.lista', [ $party->id, 'adicionados' => 1 ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
				<p class="gifts-box-number-middle-view">Ver lista</p>
				<p class="gifts-box-number-middle-selected">adicionados</p>
			</a>
		@endif

		@if ($request->selecionados)
			<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.lista', [ $party->id ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
				<p class="gifts-box-number-middle-view">Ver lista</p>
				<p class="gifts-box-number-middle-selected">sugestões</p>
			</a>
		@else
			<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.lista', [ $party->id, 'selecionados' => 1 ]) }}" class="gifts-box-number-middle toys col-md-6 dados-container">
				<p class="gifts-box-number-middle-view">Ver lista</p>
				<p class="gifts-box-number-middle-selected">selecionados</p>
			</a>
		@endif
	</div>
	<div class="gifts-box-toys-add">
		<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos.adicionar', [ $party->id ]) }}" class="dados-container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_roupas_add.png', '', array('class' => '')) }}
			<p class="gifts-box-toys-add-text">Adicionar brinquedos</p>
		</a>
		<p class="gifts-box-toys-add-legend">Adicione presentes que não achou na nossa lista de sugestões ao lado</p>
	</div>
	<div class="gifts-box-number-footer dados-container">
		@if (count($selected) > 0 || count($add) > 0)
			<a class="gifts-box-number-submit btn-modal-finalizar" href="#">Finalizar lista</a>
		@endif
		<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="gifts-box-number-back">voltar a etapa anterior</a>
	</div>
</div>