@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container criar-presentes cota">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent09.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.filtro-cotas')
				
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('site.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					<div class="gifts-list">
						@if(!isset($_COOKIE['closeModalQuotasAdd']) || empty($_COOKIE['closeModalQuotasAdd']))
							<div class="gifts-list-message">
								<button class="gifts-list-message-remove" data-cookie="closeModalQuotasAdd"></button>
								<p class="gifts-list-message-first">Crie cotas para aqueles presentes de valores maiores! Assim facilita pra todos! Cada um dando uma parcela do presente fica bem mais tranquilo e o aniversariante não fica sem ganhar o presente que tanto queria! Adicionar cotas é muito fácil! Só precisará preeencher algumas informações básicas descritas abaixo e inserir uma imagem do presente e pronto! Ao salvar ele estará automaticamente</p>
								<p class="gifts-list-message-secound">*As cotas adquiridas pelos convidados serão automaticamente convertidas em crédito na sua conta bancária. Não cadastrou seu conta bancária ainda? Não esqueça de cadastra-la a qualquer momento no painel de controle assim que finalizar a criação do aniversário.</p>
							</div>
						@endif

						<div class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Criar cota</p>
								<p class="gifts-item-price-description-cota">Preeencha algumas informações básicas descritas abaixo e inserira uma imagem do presente e pronto! Ao salvar ele estará automaticamente na sua lista de adicionados.</p>
								<form class="row criar-presentes-form" action="{{ route('usuario.meus-aniversarios.presentes.cotas.submeter', $party->id) }}" method="post" enctype="multipart/form-data">
									@if ($errors->any())
										<div class="col-md-12">
											<div class="alert alert-danger">
												<ul class="criar-presentes-errors">
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										</div>
									@endif

									<div class="col-md-4">
										<input type="file" name="foto" class="upload-image" accept="image/png, image/jpeg" value="{{ old('foto') }}" />
									</div>
									<div class="gifts-item-content col-md-8">
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome do presente" aria-describedby="gifts-name" name="nome" maxlength="100" value="{{ old('nome') }}">
											<span class="input-group-addon" id="gifts-name"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>

										<p class="gifts-item-price-description">Observação</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui alguma observação caso haja necessidade" aria-describedby="gifts-obs" maxlength="255" name="observacao" value="{{ old('observacao') }}">
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>

										<p class="gifts-item-price-description">Valor total</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="money quota form-control gifts-item-price-value bgC" placeholder="0,00" aria-describedby="gifts-total-price" name="valor_total" value="{{ old('valor_total') }}">
											<span class="input-group-addon" id="gifts-total-price"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>

										<p class="gifts-item-price-description">Quer dívidir em mais cotas ou deixar cota única?</p>
										<div class="gifts-item-price-value gifts-item-quotas-box bgC col-md-12">
											<div class="form-inline clearfix">
												<p class="radio col-md-4">
													<label data-image="{{ asset('assets/site/images/avatar/crianca-masculino.png') }}" class="form-birthday-sex-label">
														<input type="radio" name="dividir_cota" value="1" {{ !old('dividir_cota') || old('dividir_cota') == 1 ? ' checked="checked"' : '' }}>
														<span></span>
														Dívidir cota
													</label>
												</p>
												<p class="radio col-md-4">
													<label data-image="{{ asset('assets/site/images/avatar/adolescente-masculino.png') }}" class="form-birthday-sex-label">
														<input type="radio" name="dividir_cota" value="0" {{ old('dividir_cota') && old('dividir_cota') == 0 ? ' checked="checked"' : '' }}><span></span>
														Cota única 
													</label>
												</p>
											</div>
											<div class="gifts-item-quotas-split">
												<div class="row">
													<div class="form-group form-birthday-size-container col-md-5">
														<select name="quantidade_cotas" class="form-control form-birthday-size-input" id="cotas">
															<option value="">Quantidade de cotas</option>
															@for ($i = 1; $i <= 10; $i++)
																<option value="{{ $i }}" {{ old('quantidade_cotas') == $i ? 'selected' : NULL }}>{{ $i }}</option>
															@endfor
														</select>
													</div>
												</div>
												<span class="gifts-item-price-description clearfix">Valor por cota</span>
												<span class="gifts-item-price-value bgC clearfix criar-presentes-cota-valor">
													{{ old('valor_total') ? old('valor_total') / old('quantidade_cotas') : '0,00' }}
												</span>
											</div>
										</div>
										<div class="gifts-item-buttons">
											<button type="submit" name="salvar" value="salvar" class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
											<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
											<button type="submit" name="salvar" value="salvar e adicionar" class="col-md-12 gifts-item-button criar-presentes-save-continue">Salvar e adicionar um novo presente</button>
										</div>
									</div>
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection

@section('scripts')

@endsection
