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
			<div class="col-md-3 modal-img-print">
				<h5>
					<a href="#">Imprimir</a>
				</h5>
			</div>
			<div class="col-md-4">
				<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="modal-lista-botao col-md-12">Adicionar ou editar presentes</a>
			</div>
		</div>
		<div class="row lista-descricao">
			<div class="col-md-12">
				<div class="col-md-2"><strong>Lista de presentes</strong></div>
				<div class="col-md-2"><strong>10/55</strong></div>
				<div class="col-md-2"><strong>R$ 325,90</strong></div>
			</div>
		</div>
		<div class="row lista-descricao noBD">
			<div class="col-md-3 col-md-offset-9">
				<div class="form-group form-birthday-size-container col-md-12">
					<label class="col-md-6">Filtrar por</label>
					<div class="col-md-6">
						<select name="tamanho_camiseta" class="form-control form-birthday-size-input" id="cotas">
							<option value="quantidade cotas">Recentes</option>
							<option value="1">A-Z</option>
							<option value="2">Convidados</option>
							<option value="3">Disponiveis</option>
							<option value="4">Presenteados</option>
							<option value="5">Recentes</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<table class="col-md-12">
				<tbody>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-4">email@email.com.br</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal-lista-footer col-md-12">
		<span class="col-md-3"><a href="#">Anterior</a></span>
		<div class="col-md-6">Páginas 1/12</div>
		<span class="col-md-3"><a href="#">Próxima</a></span>
	</div>
</div>