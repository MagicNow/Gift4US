<!-- MODAL CONCLUIR -->
<div class="gifts-modal modal-lista-concluir hidden">
	<div class="gifts-modal-content col-md-3 col-md-offset-5">
		<h3 class="gifts-modal-title">Lista de Cotas</h3>
		<p class="gifts-modal-subtitle">Parabéns! Você está perto de finalizar sua lista de cotas!</p>
		<p class="gifts-modal-subtitle">
			<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
			<small class="gifts-box-number-header-total">{{ $quotasTotal }}</small> adicionados
		</p>
		<div class="gifts-modal-buttons">
			<a class="gifts-box-number-submit col-md-12" href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}">Concluir Lista</a>
		</div>
	</div>
</div>