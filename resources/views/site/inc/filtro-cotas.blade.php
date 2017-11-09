<div class="gifts-box-number col-md-3">
	<div class="gifts-box-number-header row">
		<div class="col-md-11 col-md-offset-1">
			<h4 class="gifts-box-number-header-title">Lista de Cotas</h4>
			<p>
				<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
				<span class="gifts-box-number-header-total">{{ $quotasTotal }}</span> adicionados
			</p>
		</div>
	</div>
	<div class="row"> 
		<a href="{{ route('usuario.meus-aniversarios.presentes.cotas', $party->id) }}" class="gifts-box-number-middle toys col-md-12 dados-container" style="width:100%">
			<p class="gifts-box-number-middle-view">Ver lista</p>
			<p class="gifts-box-number-middle-selected">adicionados</p>
		</a>
	</div>
	<div class="gifts-box-toys-add">
		<a href="{{ route('usuario.meus-aniversarios.presentes.cotas.adicionar', [ $party->id ]) }}" class="dados-container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_roupas_add.png', '', array('class' => '')) }}
			<p class="gifts-box-toys-add-text">Adicionar cotas</p>
		</a>
		<p class="gifts-box-toys-add-legend">Lembrou de alguma cota que ficou faltando? Clique no botão acima para adicionar mais cotas!</p>
	</div>
	<div class="gifts-box-number-footer dados-container">
		{{-- @if (count($selected) > 0 || count($add) > 0) --}}
			<a class="gifts-box-number-submit btn-modal-finalizar" href="#">Finalizar lista</a>
		{{-- @endif --}}
		<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="gifts-box-number-back">voltar a etapa anterior</a>
	</div>
</div>	