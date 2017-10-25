@extends('convidado/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent11.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">

			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-4">
					<div class="detalhes-festa">
						<p>Heitor</p>
						<div class="row">
							<span>30/07/2017</span>
						</div>
						<div class="row"> 
							<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
								<p class="gifts-box-number-middle-selected">Editar</p>
							</a>
							<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
								<p class="gifts-box-number-middle-selected">Excluir</p>
							</a>
						</div>
					</div>
					<div class="detalhes-festa lista-presentes">
						<p>Lista de presentes</p>
						<div class="row pD">
							<span class="pull-left">103 / 44 brinquedos</span>
							<small class="pull-left">
								<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
								<span>33</span>
							</small>
						</div>
						<div class="row pD">
							<span class="pull-left">103 / 44 roupas</span>
							<small class="pull-left">
								<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
								<span>33</span>
							</small>
						</div>
						<div class="row pD">
							<span class="pull-left">103 / 44 cotas</span>
						</div>
						<div class="row"> 
							<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
								<p class="gifts-box-number-middle-selected">Ver lista</p>
							</a>
							<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
								<p class="gifts-box-number-middle-selected">Editar</p>
							</a>
						</div>
					</div>
					<div class="detalhes-festa lista-presentes">
						<p>Presenças confirmadas</p>
						<div class="row pD">
							<span class="pull-left">43 pessoas confirmadas</span>
							<small class="pull-left">
								<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
								<span>43</span>
							</small>
						</div>
						<div class="row"> 
							<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
								<p class="gifts-box-number-middle-selected">Ver lista</p>
							</a>
							<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
								<p class="gifts-box-number-middle-selected">Editar</p>
							</a>
						</div>
					</div>
					<div class="detalhes-festa lista-presentes">
						<p>Recados recebidos</p>
						<div class="row">
							<span>02 recados</span>
						</div>
						<div class="row"> 
							<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
								<p class="gifts-box-number-middle-selected">Ver lista</p>
							</a>
							<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
								<p class="gifts-box-number-middle-selected">Download</p>
							</a>
						</div>
						<div class="gifts-box-number-footer">
							<a href="#" class="gifts-box-number-submit">ver página do aniversariante</a>
						</div>
					</div>
				</div>
				<div class="col-md-8 dados-container">
					<div class="social col-md-12">
						<div class="gifts-box-number-footer">
							<div class="pull-left col-md-5">
								<a href="#" class="btn-print">Imprimir convite</a>
							</div>
							<div class="pull-right col-md-6">
								<a href="#" class="btn-invite">Enviar convites</a>
							</div>
						</div>
					</div>
					<div>
					CONTEUDO
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
