<div class="col-md-12 my-birthday" data-presente="{{ asset('assets/site/images/presentinho_aniversario.png') }}">
	<div class="my-birthday-remove">
		<div class="row">
			<div class="col-md-4 my-birthday-item-input">
				<span class="my-birthday-item-lixeira">&nbsp;</span>
			</div>
			<div class="col-md-8 my-birthday-item-text text-right">
				<span class="my-birthday-item-name">{{ $festa->nome }}</span>
				<span class="my-birthday-item-date">{{ $festa->festa_dia }}/{{ $festa->festa_mes }}/{{ $festa->festa_ano }}</span>
			</div>
		</div>
		<span class="col-md-12 row text-center my-birthday-item-confirm">Você realmente quer <strong>EXCLUIR</strong> este aniversário?</span>
		<form method="post" action="{{ route('usuario.meus-aniversarios.excluir', $festa->id) }}">
			<div class="btn-group my-birthday-actions">
				<a href="{{ route('usuario.meus-aniversarios') }}" class="btn btn-default col-md-6 my-birthday-actions-button my-birthday-actions-button-no">Não</a>
				<button type="submit" class="btn btn-default col-md-6 my-birthday-actions-button my-birthday-actions-button-yes">Sim</button>
			</div>
		</form>
		<p class="row col-md-12 text-center my-birthday-item-date"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Talvez você queira somente editar esse aniversário</p>
	</div>
</div>