<!-- MODAL LISTA RECADOS -->
<div class="modal-lista-presentes {{ $request->modal === 'lista-de-recados' ?: 'hidden' }}" id="lista-presenca">
	<div class="modal-lista-header">
		<a href="{{ route('notificacoes.aniversario', [ $party->id ]) }}">X</a>
	</div>
	<div class="modal-content-lista col-md-12">
		<div class="clearfix lista-header row">
			<div class="col-md-3 text-left">
				<h5>{{ $party->nome }}</h5>
				<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
			</div>
		</div>
		<div class="row lista-descricao bdBottom">
		</div>
		@if (count($party->mensagem) > 0)
			<div class="row">
				<table class="col-md-12">
					<thead>
						<tr>
							<td class="color-black">Nome</td>
							<td class="color-black">Mensagem</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($party->mensagem as $mensagem)
							<tr>
								<td class="col-md-3">{{ $mensagem->nome }}</td>
								<td class="col-md-9">{{ $mensagem->mensagem }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
</div>