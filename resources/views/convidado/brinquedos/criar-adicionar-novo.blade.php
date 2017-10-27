@extends('convidado/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent09.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Cotas</h4>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total">0</span> adicionados
							</p>
						</div>
					</div>
					<div class="row"> 
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos/lista?selecionados=1" class="gifts-box-number-middle toys col-md-12 dados-container" style="width:100%">
							<p class="gifts-box-number-middle-view">Ver lista</p>
							<p class="gifts-box-number-middle-selected">selecionados</p>
						</a>
					</div>
					<div class="gifts-box-number-footer dados-container">
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="alerta">
						<a href="#">X</a>
						<p>
						 Crie cotas para aqueles presentes de valores maiores! Assim facilita pra todos! Cada um dando uma parcela do presente fica bem mais tranquilo e o aniversariante não fica sem ganhar o presente que tanto queria! Adicionar cotas é muito fácil! Só precisará preeencher algumas informações básicas descritas abaixo e inserir uma imagem do presente e pronto! Ao salvar ele estará automaticamente
						</p>
						<small>*As cotas adquiridas pelos convidados serão automaticamente convertidas em crédito na sua conta bancária. Não cadastrou seu conta bancária ainda? Não esqueça de cadastra-la a qualquer momento no painel de controle assim que finalizar a criação do aniversário.</small>
					</div>
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Criar cota</p>
								<p class="gifts-item-price-description-cota">Preeencha algumas informações básicas descritas abaixo e inserira uma imagem do presente e pronto! Ao salvar ele estará automaticamente na sua lista de adicionados.</p>
								<div class="col-md-4">
									<p class="gifts-item-price-description-upload bgC">Adicionar imagem do produto</p>
									<input type="file" name="arquivos" class="upload-image"  accept="image/png, image/jpeg" />
									<script>
										setTimeout(function(){ 
											$('.gifts-item-price-description-upload').click(function(){
		  										$('.upload-image').click();
											});
											$('.criarPresentes .alerta a').click(function(){
		  										$('.criarPresentes .alerta').hide();
											});
										}, 300);
									</script>
								</div>
								<div class="gifts-item-content col-md-8">
									<p class="gifts-item-price-value bgC">Escreva aqui o nome do presente<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-description">Observação</p>
									<p class="gifts-item-price-value bgC">Escreva aqui alguma observação caso haja necessidade<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-description">Valor total</p>
									<p class="gifts-item-price-value bgC">0,00<a href="#" class="bt-editar">Editar</a></p>
									<p class="gifts-item-price-description">Quer dívidir em mais cotas ou deixar cota única?</p>
									<div class="gifts-item-price-value bgC col-md-12">
										<p class="radio col-md-4">
											<label data-image="http://vagrant.gift4us/public/assets/site/images/avatar/crianca-masculino.png" class="form-birthday-sex-label">
												<input type="radio" name="ciclo_vida" value="Criança" checked="checked">
												<span></span>
												Dívidir cota
											</label>
										</p>
										<p class="radio col-md-4">
											<label data-image="http://vagrant.gift4us/public/assets/site/images/avatar/adolescente-masculino.png" class="form-birthday-sex-label">
												<input type="radio" name="ciclo_vida" value="unica"><span></span>
												Cota única 
											</label>
										</p>
										<div class="form-group form-birthday-size-container  col-md-4">
											<select name="tamanho_camiseta" class="form-control form-birthday-size-input" id="cotas">
												<option value="quantidade cotas">quantidade cotas</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
										<span class="gifts-item-price-description col-md-12">Valor por cota</span>
										<span class="gifts-item-price-value bgC col-md-12">0,00</span>
									</div>
									<div class="gifts-item-buttons">
										<button class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
										<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
										<button class="col-md-12 gifts-item-button gifts-item-button-select">Salvar e adicionar um novo presente</button>
									</div>
									<fieldset class="">
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
