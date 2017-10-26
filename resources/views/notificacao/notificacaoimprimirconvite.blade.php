@extends('convidado/master')

@section('content')

	<div class="dashboard imprimir-convite-geral col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_convite.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">

			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-4">
					<div class="detalhes-festa">
					<div class="col-md-12 my-birthday-item-input" style="overflow: hidden;">
					<div class="jquery-switch-wrapper">
					<a class="jquery-switch jquery-switch-on" href="#" name="my-birthday-3" rel="active[3]"></a></div>

					</div>
							
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
				<div class="col-md-7 dados-container dados-container-imprimirconvite">
					<div class="social col-md-12">
						<div class="gifts-box-number-footer">
							<div class="pull-left col-md-5">
								<a href="#" class="btn-print">Imprimir convite</a>
							</div>
							<div class="pull-right col-md-6">
								<a href="#" class="btn-invite">Voltar</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="detalhes-imprimir-festa">
					<p>Escolha abaixo o layout do convite que quer imprimir para os seus convidados</p>
					</div>
					
					<div class="pull-left zoom">
							<div class="detalhes-imprimir-festa">
								<h1>Convite complementar</h1>
					<p class="cm">6,5cm x 3,5 cm</p>
					</div>
					<center>
					  <div class="convite-imprimirconvite">
						  <img src="{{ asset('assets/site/images/logo-rodape.png') }}" class="imglogo">
                  
                          <div class="texto">
							  <img src="{{ asset('assets/site/images/um.png') }}">
                          
                            <br/>
                                <b>acesse:GIFT4US.COM.BR</b>
                               <br/>
                         <img src="{{ asset('assets/site/images/dois.png') }}">
                            <br/>
                      <span>Insira o nome do aniversariante
                         ou o código AR265AL17
                          </span>
                      <br/>
                       <img src="{{ asset('assets/site/images/tres.png') }}">
                                <br/>
                      <span>Confirme sua presença
                         e encontre a lista de presentes</span>
         
                        </div>
                   
                 </div>
				 
				 </center>
				 <div class="gifts-box-number-footer">
							<a href="#" class="gifts-box-number-submit imprimir-btn">IMPRIMIR</a>
						</div>
				  <p class="detalhes-imprimir-festa">Cada folha formato A4 contém 24 convites</p> 
                 </div> 
				<div class="pull-left zoom" style="border:none;"> 
					  <div class="detalhes-imprimir-festa">
								<h1>Convite Gift4us</h1>
					<p class="cm">16 cm x 9 cm</p>

					</div>
					<div class="imprimir-zoom"> 
	              <div class="imprimir-zoom convite">
			     
						<div class="header-convite">
							<img src="{{ asset('assets/site/images/bg-header-convite.png') }}" alt="Festa">
							<img src="{{ asset('assets/site/images/img-convidado-heitor.png') }}" width="114px" height="112" alt="Heitor">
							<p>
								Festa de 3 anos do<br /><span>Arthurzinho Albuquerque</span>
							</p>
						</div>
						<div class="passos pull-left">
							<div class="bg"></div>
							<div class="passo1">
								<div class="bg-presente">1</div>
								<span>entre no site www.gift4us.com</span>
							</div>
							<div class="passo2">
								<div class="bg-presente">2</div>
								<span>insira o aniversário ou o código <strong>AR265AL17</strong></span>
							</div>
							<div class="passo3">
								<div class="bg-presente">3</div>
								<span>confira a lista de presentes e confirme sua presença</span>
							</div>
						</div>
						<div class="data-festa pull-right">
							<span>30/10/2017, 16h30</span>
						</div>
						<div class="local-festa pull-right">
							<div class="bg"></div>
							<div class="endereco">
								<h6>Onde?</h6>
								<h5>Rua Taquari, 941 - ap12, Bloco1- Mooca<br />São Paulo - SP</h5>
								<h5>Próximo a Padaria Cassandoca</h5>
								<h6>Observações:</h6>
								<h5>Levar 1 litro de leite para doação.</h5>
							</div>
						</div>
					</div>
					</div>
					<div class="gifts-box-number-footer">
							<a href="#" class="gifts-box-number-submit imprimir-btn">IMPRIMIR</a>
						</div>
				  <p class="detalhes-imprimir-festa">Cada folha formato A4 contém 4 convites</p> 
					</div>	
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
