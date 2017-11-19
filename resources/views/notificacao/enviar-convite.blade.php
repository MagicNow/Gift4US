@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criarPresentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent11.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">

			<div class="gifts-container row col-md-offset-2">
				<div class="gifts-box-number col-md-4">
					@include('notificacao.inc.menu')
				</div>
				<div class="col-md-8 dados-container">
					<div class="social gifts-box-number-footer clearfix">
						<div class="col-md-12">
							<div class="convites-enviar-bg clearfix">
								<div class="col-md-8 text-right">
									<span class="convites-texto">Enviar convites</span>
									<a href="#" class="convites-enviar email">E-mail</a><a href="#" class="convites-enviar fb">Facebook</a><a href="#" class="convites-enviar whats">Whatsapp</a>
								</div>
								<div class="col-md-4 text-right">
									<a href="#" class="btn-back">Voltar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="enviar-convite">
						<div class="row enviar-convite-secao">
							<div class="col-md-7">
								<h5>Link da página do aniversáriante</h5>
								<span id="convite-url">{{ route('convidado.index', $party->id) }}</span>
								<button type="button" class="copy-button enviar-convite-button" data-clipboard-target="#convite-url">Copiar</button>
							</div>
							<div class="col-md-5">
								<h5>Código único do aniversário</h5>
								<span id="convite-codigo">{{ $party->codigo }}</span>
								<btton type="button" class="copy-button enviar-convite-button" data-clipboard-target="#convite-codigo">Copiar</button>
							</div>
						</div>
						<div class="row compartilhe enviar-convite-secao">
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="facebook">Compartilhar no Facebook</h5>
								<div class="col-md-12">
									<a href="#" class="col-md-6 enviar-convite-button">Compartilhar em evento</a>
									<a href="#" class="col-md-6 enviar-convite-button">Compartilhar no perfil</a>
								</div>
							</div>
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="whatsapp">Compartilhar no Whatsapp</h5>
								<div class="col-md-12">
									<a href="#" class="col-md-6 enviar-convite-button">Compartilhar convite</a>
									<a href="whatsapp://send?text={{ route('convidado.index', $party->id) }}" class="col-md-6 enviar-convite-button">Compartilhar link da pagina</a>
								</div>
							</div>
						</div>
						<div class="row compartilhe enviar-convite-secao">
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="email">Email</h5>
								<h5>Lista emails</h5>
								<div class="col-md-12">
									<a href="#" class="col-md-6 enviar-convite-button">Criar<br />nova lista</a>
									<a href="#" class="col-md-6 bgC enviar-convite-button">Resgatar lista antiga</a>
								</div>
							</div>
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="download">Download</h5>
								<div class="row">
									<div class="col-md-6">
										<img src="{{ asset('assets/site/images/img-convite.png') }}" />
										<a href="#" class="col-md-12 enviar-convite-button">Baixar</a>
									</div>
									<div class="col-md-6">
										<img src="{{ asset('assets/site/images/img-qrcode.png') }}" />
										<a href="#" class="col-md-12 enviar-convite-button">Baixar</a>
									</div>
								</div>
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
