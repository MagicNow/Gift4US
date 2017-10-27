@extends('convidado/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent10.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-3">
					<div class="gifts-box-number-header row">
						<div class="col-md-11 col-md-offset-1">
							<h4 class="gifts-box-number-header-title">Lista de Roupas</h4>
							<p>
								<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
								<span class="gifts-box-number-header-total">14</span> selecionados
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
						<a class="gifts-box-number-submit" href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/passo/5">Finalizar lista</a>
						<a href="http://vagrant.gift4us/public/usuario/meus-aniversarios/festa/3/presentes/brinquedos" class="gifts-box-number-back">voltar a etapa anterior</a>
					</div>
				</div>
				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Ver detalhes</p>
								<div class="gifts-item-content gifts-item-content-preview col-md-12">
									<div class="iframeEcommerce" style="width:100%;height:300px;background-color:#4d5053">
										E-Commerce
									</div>
									<div class="gifts-item-buttons pull-right col-md-8">
										<button class="col-md-6 gifts-item-button gifts-item-button-show">Voltar</button>
										<button class="col-md-6 gifts-item-button gifts-item-button-select" style="padding-top:2px!important;">Excluir da lista</button>
									</div>
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
