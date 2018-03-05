<!-- MODAL LISTA PRESENTES -->
<div class="modal-lista-presentes {{ $request->modal === 'lista-de-presentes' ?: 'hidden' }}"" id="lista-presente">
	<div class="modal-lista-header">
		<a href="{{ route('notificacoes.aniversario', [ $party->id ]) }}"">X</a>
	</div>
	<div class="modal-content-lista col-md-12">
		<div class="row lista-ferramentas">
			<div class="col-md-2">
				<div class="col-md-8 my-birthday-item-input">
					<input type="checkbox" name="active[{{ $party->id }}]" id="my-birthday-{{ $party->id }}" class="my-birthday-checkbox" value="1" {{ $party->ativo ? 'checked' : NULL }} data-festa-id="{{ $party->id }}" />
				</div>
			</div>
			<div class="col-md-3">
				<h5>{{ $party->nome }}</h5>
				<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
			</div>
			{{--  <div class="col-md-3 modal-img-print">
				<h5>
					<a href="#">Imprimir</a>
				</h5>
			</div>  --}}
			<div class="col-md-4 col-md-offset-3">
				<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="modal-lista-botao col-md-12">Adicionar ou editar presentes</a>
			</div>
		</div>
		<div class="row lista-descricao">
			<div class="col-md-12">
				<div class="col-md-2"><strong>Lista de presentes</strong></div>
				<div class="col-md-2"><strong>{{ $toysBuyed + $clothesBuyed + $quotasBuyed }}/{{ $toysTotal + $clothesTotal + $quotasTotal }}</strong></div>
				<div class="col-md-2"><strong>R$ {{ $clothesBuyedCost + $quotasBuyedCost }}</strong></div>
			</div>
		</div>
		<div class="row lista-descricao noBD">
			<div class="col-md-3 col-md-offset-9">
				<div class="form-group form-birthday-size-container col-md-12">
					<label class="col-md-6">Filtrar por</label>
					<div class="col-md-6">
						<select name="ordem" class="form-control form-birthday-size-input modal-content-lista-order">
							<option value="{{ route('notificacoes.aniversario', [$party->id]) }}?modal={{ $request->modal }}&page={{ $request->page }}&ordem=recentes" {{ isset($request->ordem) && $request->ordem == 'recentes' ? 'selected' : NULL }}>Recentes</option>
							<option value="{{ route('notificacoes.aniversario', [$party->id]) }}?modal={{ $request->modal }}&page={{ $request->page }}&ordem=az" {{ isset($request->ordem) && $request->ordem == 'az' ? 'selected' : NULL }}>A-Z</option>
							<option value="{{ route('notificacoes.aniversario', [$party->id]) }}?modal={{ $request->modal }}&page={{ $request->page }}&ordem=convidados" {{ isset($request->ordem) && $request->ordem == 'convidados' ? 'selected' : NULL }}>Convidados</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@if (count($presentes) > 0)
				<table class="col-md-12">
					<tbody>
						@foreach($presentes as $presente)
							<tr>
								<td class="col-md-4">{{ $presente->presente_nome }}</td>
								<td class="col-md-2">{{ $presente->valor_venda == 'irá presentear' ? $presente->valor_venda : 'R$ ' . $presente->valor_venda }}</td> 
								<td class="col-md-2">{{ $presente->convidado_nome }}</td>
								<td class="col-md-4">{{ $presente->convidado_email }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>

	@if (count($presentes) > 0)
		{{ $presentes->links('notificacao.inc.gifts-paginator', ['request' => $request, 'party' => $party->id]) }}
	@endif
</div>