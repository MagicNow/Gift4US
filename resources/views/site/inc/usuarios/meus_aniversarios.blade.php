<div class="col-md-12 my-birthday" data-presente="{{ asset('assets/site/images/presentinho_aniversario_novo.png') }}">
	@if (count($festas['festas_ativas']) > 0)
		<h3 class="my-birthday-title">Meus aniversários</h3>
		<a href="{{ route('usuario.meus-aniversarios.novo') }}" class="my-birthday-create-button-small">Criar novo aniversário</a>
		{{-- <a href="{{ route('aniversario.criar') }}" class="my-birthday-create-button-small">Criar novo aniversário</a> --}}
		<div class="my-birthday-list">
			@foreach ($festas['festas_ativas'] as $festa)
				<div class="my-birthday-item">
					<div class="row">
						<div class="col-md-4 my-birthday-item-input">
							<input type="radio" name="name" id="my-birthday-1" class="my-birthday-checkbox" value="1" checked="checked" disabled="disabled" />
						</div>
						<div class="col-md-8 my-birthday-item-text text-right">
							<span class="my-birthday-item-name">{{ $festa->nome }}</span>
							<span class="my-birthday-item-date">{{ $festa->festa_dia }}/{{ $festa->festa_mes }}/{{ $festa->festa_ano }}</span>
							<span class="my-birthday-item-presente">33</span>
						</div>
					</div>
					<a href="#" class="row col-md-12 text-center my-birthday-item-enter">Entrar no aniversário</a>
				</div>
			@endforeach
		</div>
	@endif

	@if (count($festas['festas_antigas']) > 0)
		<h3 class="my-birthday-title">Aniversários antigos</h3>

		@foreach ($festas['festas_antigas'] as $festa)
			<div class="my-birthday-item">
				<div class="row">
					<div class="col-md-4 my-birthday-item-input">
						<span class="my-birthday-item-archived">Arquivado</span>
					</div>
					<div class="col-md-8 my-birthday-item-text text-right">
						<span class="my-birthday-item-name">{{ $festa->nome }}</span>
						<span class="my-birthday-item-date">{{ $festa->festa_dia }}/{{ $festa->festa_mes }}/{{ $festa->festa_ano }}</span>
						<a href="{{ route('usuario.meus-aniversarios.excluir', $festa->id) }}" class="my-birthday-item-lixeira">&nbsp;</a>
					</div>
				</div>
				<a href="#" class="row col-md-12 text-center my-birthday-item-enter">Entrar no aniversário</a>
			</div>
		@endforeach
	@endif

	@if (count($festas['festas_antigas']) === 0 && count($festas['festas_ativas']) === 0)
		<span class="usuario-form-header-text my-birthday-header-text">
			Você ainda não tem nenhum aniversário criado.
		</span>
		<span class="my-birthday-new-text">Crie um agora mesmo!</span>
		<a class="my-birthday-create-button" href="{{ route('usuario.meus-aniversarios.novo') }}"><img src="{{ asset("assets/site/images/criar_aniversario_botao.png") }}"></a>
		{{-- <a class="my-birthday-create-button" href="{{ route('aniversario.criar') }}"><img src="{{ asset("assets/site/images/criar_aniversario_botao.png") }}"></a> --}}
		<span class="usuario-form-header-text">Usando o Gift4Us você terá acesso a uma série de ferramentas para organizar sua festa, convidar todos os seus conhecidos e deixar a disposição deles as listas de presentes. Tá esperando o quê para criar sua festa?</span>
		<div class="my-birthday-footer">
			<span class="my-birthday-new-text my-birthday-footer-text1">Meus aniversários</span>
			<span class="my-birthday-footer-text2">Nenhum aniversário criado</span>
		</div>
	@endif
</div>