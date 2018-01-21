<!-- MODAL LISTA PRESENCA -->
<div class="modal-lista-presentes {{ $request->modal === 'lista-de-aniversarios' ?: 'hidden' }}" id="lista-presenca">
	<div class="modal-lista-header">
		<a href="{{ route('notificacoes.aniversario', [ $party->id ]) }}">X</a>
	</div>
	<div class="modal-content-lista col-md-12">
		<div class="row lista-ferramentas">
			<div class="col-md-2">
				<div class="col-md-8 my-birthday-item-input">
					<input type="checkbox" name="active[{{ $party->id }}]" id="my-birthday-{{ $party->id }}" class="my-birthday-checkbox" value="1" data-festa-id="{{ $party->id }}" />
				</div>
			</div>
			<div class="col-md-3 text-right">
				<h5>{{ $party->nome }}</h5>
				<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
			</div>
			<div class="col-md-3 modal-img-print">
				<h5>
					<a href="{{ route('notificacoes.imprimir.presencas', $party->id) }}">Imprimir</a>
				</h5>
			</div>
			<div class="col-md-4">
				<a href="#" class="modal-lista-presenca col-md-12">Presenças confirmadas</a>
			</div>
		</div>
		<div class="row lista-descricao bdBottom">
			<div class="col-md-12">
				<div class="col-md-4"><strong>Presenças confirmadas {{ $presencasTotal }}</strong></div>
				@if ($presencasTotal > 0)
					<form class="col-md-3 bt-search" method="get" action="{{ route('notificacoes.aniversario', [ $party->id ]) }}">
						<input type="hidden" name="modal" value="lista-de-aniversarios">
						<div class="form-group">
						<input type="text" class="form-control form-input" id="aniver-observacoes" name="busca" placeholder="Insira aqui o que está procurando" value="{{ $request->busca }}">
						</div>
					</form>
					<form class="col-md-5 modal-lista-letras" method="get" action="{{ route('notificacoes.aniversario', [ $party->id ]) }}">
						<input type="hidden" name="modal" value="lista-de-aniversarios">
						@foreach (range('a', 'z') as $char)
							<div class="modal-lista-letras-item">
								<input type="radio" name="inicial" {{ $request->inicial == $char ? 'checked' : NULL }} value="{{ $char }}" id="modal-inicial-input-{{ $char }}" class="hidden modal-lista-letras-input">
								<label for="modal-inicial-input-{{ $char }}" class="modal-lista-letras-botao">{{ $char }}</label></div>
						@endforeach
						<div class="modal-lista-letras-item">
							<input type="radio" name="inicial" {{ $request->inicial == '' ? 'checked' : NULL }} value="" id="modal-inicial-input-todos" class="hidden modal-lista-letras-input">
							<label for="modal-inicial-input-todos" class="modal-lista-letras-botao">TODOS</label></div>
					</form>
				@endif
			</div>
		</div>
		@if ($presencasTotal > 0)
			<div class="row">
				<table class="col-md-12">
					<tbody>
						@foreach ($presencas as $presenca)
							<tr>
								<td class="col-md-6">{{ $presenca->nome }}</td>
								<td class="col-md-6">{{ $presenca->numero_pessoas }} pessoa(s)</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
	@if ($presencasTotal > 0)
		<div class="modal-lista-footer col-md-12">
			@if ($pagina > 1)
				<span class="col-md-3"><a href="{{ $request->fullUrlWithQuery(['pagina' => $pagina-1 ]) }}">Anterior</a></span>
			@else
				<span class="col-md-3"></span>
			@endif
			<div class="col-md-6">Páginas {{ $pagina }}/{{ $paginas }}</div>
			@if ($pagina < $paginas)
				<span class="col-md-3"><a href="{{ $request->fullUrlWithQuery(['pagina' => $pagina+1 ]) }}">Próxima</a></span>
			@endif
		</div>
	@endif
</div>