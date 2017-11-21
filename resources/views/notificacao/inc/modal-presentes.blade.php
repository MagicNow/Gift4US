<!-- MODAL LISTA PRESENTES -->
<div class="modal-lista-presentes" id="lista-presente" style="display:none;">
	<div class="modal-lista-header">
		<a href="#">X</a>
	</div>
	<div class="modal-content-lista col-md-12">
		<div class="row lista-ferramentas">
			<div class="col-md-2">
				<div class="col-md-8 my-birthday-item-input">
					<input type="checkbox" name="active[3]" id="my-birthday-3" class="my-birthday-checkbox" value="1" data-festa-id="3" />
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
				<a href="#" class="modal-lista-botao col-md-12">Adicionar ou editar presentes</a>
			</div>
		</div>
		<div class="row lista-descricao">
			<div class="col-md-12">
				<div class="col-md-2"><strong>Lista de presentes</strong></div>
				<div class="col-md-2"><strong>10/55</strong></div>
				<div class="col-md-2"><strong>R$ 325,90</strong></div>
				<div class="col-md-6">
					<div class="row">
						<div class="gifts-filter col-md-12">
							<ul class="gifts-filter-categories">
								<li class="gifts-filter-categories-item active">
									<a href="http://vagrant.gift4us/public/convidado/4/brinquedos">
										<i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i>
										<span>brinquedos</span>
									</a>
								</li>
								<li class="gifts-filter-categories-item">
									<a href="http://vagrant.gift4us/public/convidado/4/roupas">
										<i class="gifts-filter-categories-icon gifts-filter-categories-clothes"></i>
										<span>roupas</span>
									</a>
								</li>
								<li class="gifts-filter-categories-item">
									<a href="http://vagrant.gift4us/public/convidado/4/cotas">
										<i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i>
										<span>cotas</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row lista-descricao noBD">
			<div class="col-md-12">
				<div class="col-md-6"><strong>Recentes</strong></div>
				<div class="col-md-3 bt-search">
					<div class="form-group">
					<input type="text" class="form-control form-input" id="aniver-observacoes" name="observacoes" value="Insira aqui o que está procurando">
					</div>
				</div>
				<div class="col-md-3">
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
		</div>
		<div class="row">
			<table class="col-md-12">
				<tbody>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr class="bgC">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">R$ 60,00</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr class="bgC">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr class="bgC">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr class="bgC">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr>
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">irá presentear</td> 
						<td class="col-md-3">Nome do Convidado</td>
						<td class="col-md-3">email@email.com.br</td>
						<td class="col-md-1"></td>
					</tr>
					<tr class="bgC active">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">Disponivel</td> 
						<td class="col-md-3"></td>
						<td class="col-md-3"></td>
						<td class="col-md-1">
							<a href="#" class="remover">Remover</a>
						</td>
					</tr>
					<tr class="active">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">Disponivel</td> 
						<td class="col-md-3"></td>
						<td class="col-md-3"></td>
						<td class="col-md-1">
							<a href="#" class="editar">Editar</a>
							<a href="#" class="remover">Remover</a>
						</td>
					</tr>
					<tr class="bgC active">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">Disponivel</td> 
						<td class="col-md-3"></td>
						<td class="col-md-3"></td>
						<td class="col-md-1">
							<a href="#" class="remover">Remover</a>
						</td>
					</tr>
					<tr class="active">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">Disponivel</td> 
						<td class="col-md-3"></td>
						<td class="col-md-3"></td>
						<td class="col-md-1">
							<a href="#" class="editar">Editar</a>
							<a href="#" class="remover">Remover</a>
						</td>
					</tr>
					<tr class="bgC active">
						<td class="col-md-3">Boneco doidera ed. especial</td>
						<td class="col-md-2">Disponivel</td> 
						<td class="col-md-3"></td>
						<td class="col-md-3"></td>
						<td class="col-md-1">
							<a href="#" class="remover">Remover</a>
						</td>
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