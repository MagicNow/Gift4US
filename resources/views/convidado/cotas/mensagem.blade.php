@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent06.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="input-group gifts-filter-search pull-right" method="get">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="search" class="form-control gifts-filter-search-input" name="busca" placeholder="presente que está procurando" value="">
					</div>
					<div class="gifts-filter-select-container pull-right">
						<select class="gifts-filter-select select2-hidden-accessible" name="ordenacao" tabindex="-1" aria-hidden="true">
							<option value=""></option>
							<option value="maiorPreco">Maior preço</option>
							<option value="menorPreco">Menor preço</option>
							<option value="AZ">A-Z</option>
							<option value="ZA">Z-A</option>
							<option value="MaisVendidos">Mais vendidos</option>
							<option value="Lancamentos">Lançamento</option>
						</select>
						<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;">
							<span class="selection">
								<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ordenacao-3c-container">
									<span class="select2-selection__rendered" id="select2-ordenacao-3c-container">
										<span class="select2-selection__placeholder">ordenar por</span>
									</span>
									<span class="select2-selection__arrow" role="presentation">
										<b role="presentation"></b>
									</span>
								</span>
							</span>
							<span class="dropdown-wrapper" aria-hidden="true"></span>
						</span>
					</div>
					<div class="porcentagem">
						<span style="width:25%"></span>
						<strong>25% disponivel</strong>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					<div class="mensagem-interna">
						<form>
							<fieldset class="col-md-12">
								<strong class="my-birthday-create-button-small">Eba</strong>
								<p class="text-left">Com certeza vou adorar o presente! Você receberá um e-mail com os detalhes da festa! Não esqueça de deixar uma mensagem!</p>
								<div class="form-group">
									<input type="text" name="nome" id="msg-nome" class="form-control form-input" placeholder="nome">
								</div>
								<div class="form-group">
									<textarea name="mensagem" id="msg-mensagem" class="form-control form-input" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
								</div>
								<button type="submit" class="enviar msg-form-enviar"> Enviar</button>
							</fieldset>
						</form>
						<img src="{{ asset('assets/site/images/presentinho-blue-02.png') }}" class="presentinho-azul" alt="">
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection

@section('scripts')

@endsection
