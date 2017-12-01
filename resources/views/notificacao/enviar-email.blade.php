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
									<a href="{{ url()->previous() }}" class="btn-back">Voltar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="lista-email">
						<h5 class="title">Email</h5>
						<h5>Adicionar emails</h5>
						<form action="{{ url('api/lista/adicionar') }}" method="post" class="col-md-12 form-invite-list">
							<input type="hidden" name="festas_id" value="{{ $party->id }}">
							<input class="texto col-md-8" type="text" name="email" placeholder="escreva aqui o e-mail do convidado" />
							<button class="col-md-4 adicionar-email form-invite-button" type="submit">Adicionar</button>
						</form>
						<fieldset class="col-md-12">
							<label class="col-md-8">Quer adicionar algum email que esteja em uma lista antiga?</label>
							<button class="col-md-4 bgC form-invite-button" type="button">E-mail lista antiga</button>
						</fieldset>
						<fieldset class="border col-md-12">
							<label class="col-md-8">Já tem todos esse email digitados em um arquivo .txt?</label>
							<button class="col-md-4 gifts-item-price-description-upload form-invite-button" type="button">Upload .txt</button>
							<input type="file" name="arquivos" class="upload-image" accept="text/plain" />
						</fieldset>
						<ul class="col-md-12 form-invite-results">
							@if ($party->lista->count() > 0)
								@foreach($party->lista as $email)
									<li class="form-invite-results-item">
										<form action="{{ url('api/lista/remover') }}" method="post" class="col-md-12 form-invite-delete">
											<input type="hidden" name="id" class="form-invite-fields-id" value="{{ $email->id }}">
											<input name="_method" type="hidden" value="DELETE">
											<button type="submit" class="form-invite-delete-button">Excluir</button> <span class="form-invite-fields-email">{{ $email->email }}</span>
										</form>
									</li>
								@endforeach
							@else
								<li class="form-invite-results-item hidden">
									<form action="{{ url('api/lista/remover') }}" method="post" class="col-md-12 form-invite-delete">
										<input type="hidden" name="id" class="form-invite-fields-id">
										<input name="_method" type="hidden" value="DELETE">
										<button type="submit" class="form-invite-delete-button">Excluir</button> <span class="form-invite-fields-email"></span>
									</form>
								</li>
							@endif
						</ul>
						<fieldset class="bottom col-md-12">
							<div>
								<label class="col-md-12 form-invite-count">{{ $party->lista->count() }} emails cadastrados</label>
								<button class="col-md-12 form-invite-button" type="button">Enviar</button>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
