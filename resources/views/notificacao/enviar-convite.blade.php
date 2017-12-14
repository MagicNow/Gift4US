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
									<a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar email">E-mail</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar fb">Facebook</a><a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="convites-enviar whats">Whatsapp</a>
								</div>
								<div class="col-md-4 text-right">
									<a href="{{ route('notificacoes.aniversario', $party->id) }}" class="btn-back">Voltar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="enviar-convite">
						<div class="row enviar-convite-secao">
							<div class="col-md-7">
								<h5>Link da página do aniversáriante</h5>
								<span class="enviar-convite-texto" id="convite-url">{{ route('convidado.index', $party->id) }}</span>
								<div class="row">
									<button type="button" class="copy-button enviar-convite-button col-md-6" data-clipboard-target="#convite-url"><span class="button">Copiar</span></button>
								</div>
							</div>
							<div class="col-md-5">
								<h5>Código único do aniversário</h5>
								<span class="enviar-convite-texto" id="convite-codigo">{{ $party->codigo }}</span>
								<div class="row">
									<button type="button" class="copy-button enviar-convite-button col-md-7" data-clipboard-target="#convite-codigo"><span class="button">Copiar</span></button>
								</div>
							</div>
						</div>
						<div class="row compartilhe enviar-convite-secao">
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="facebook">Compartilhar no Facebook</h5>
								<div class="row">
									<a href="https://www.facebook.com/sharer/sharer.php?u={{ route('convidado.index', $party->id) }}" target="_blank" class="col-md-12 enviar-convite-button"><span class="button">Compartilhar<br>no perfil</span></a>
								</div>
							</div>
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="whatsapp">Compartilhar no Whatsapp</h5>
								<div class="row">
									<a href="whatsapp://send?text={{ url(Storage::url('public/birthdays/invites/' . $party->id . '.jpg')) }}" class="col-md-6 enviar-convite-button"><span class="button">Compartilhar convite</span></a>
									<a href="whatsapp://send?text={{ route('convidado.index', $party->id) }}" class="col-md-6 enviar-convite-button"><span class="button">Compartilhar <br>link da página</span></a>
								</div>
							</div>
						</div>
						<div class="row compartilhe enviar-convite-secao">
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="email">Email</h5>
								<h5>Lista emails</h5>
								<div class="row">
									<a href="{{ route('notificacoes.enviaremail', $party->id) }}" class="col-md-12 enviar-convite-button"><span class="button">Criar<br />nova lista</span></a>
								</div>
							</div>
							<div class="col-md-6 enviar-convite-coluna">
								<h5 class="download">Download</h5>
								<div class="row">
									@if (Storage::exists('public/birthdays/invites/' . $party->id . '.jpg'))
										<div class="col-md-6">
											<img src="{{ Storage::url('public/birthdays/invites/' . $party->id . '.jpg') }}" width="78" />
											<a href="{{ Storage::url('public/birthdays/invites/' . $party->id . '.jpg') }}" target="_blank" download class="enviar-convite-button"><span class="button">Baixar</span></a>
										</div>
									@endif
									<div class="col-md-6">
										<img src="{{ asset('assets/site/images/img-qrcode.png') }}" />
										<a href="#" class="enviar-convite-button"><span class="button">Baixar</span></a>
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
