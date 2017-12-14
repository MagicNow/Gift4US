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
									<a href="{{ route('notificacoes.enviarconvite', $party->id) }}" class="btn-back">Voltar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="lista-email">
						<h5 class="title">Email</h5>
						<h5>Adicionar emails</h5>
						<form action="{{ url('api/lista/adicionar') }}" method="post" class="col-md-12 form-invite-list">
							<input type="hidden" name="festas_id" value="{{ $party->id }}">
							<input class="texto col-md-8 form-invite-email" type="text" name="email" placeholder="escreva aqui o e-mail do convidado" />
							<button class="col-md-4 adicionar-email form-invite-button" type="submit">Adicionar</button>
						</form>
						<fieldset class="col-md-12">
							<label class="col-md-8">Quer adicionar algum email que esteja em uma lista antiga?</label>
							@if (count($partyLists) > 0)
								<button class="col-md-4 form-invite-button form-invite-old-list" type="button" data-festas-lista="{{ implode(',', $partyLists) }}" data-festas-id="{{ $party->id }}" data-toggle="modal" data-target="#inviteList">E-mail lista antiga</button>
							@else
								<button class="col-md-4 bgC form-invite-button" disabled type="button">E-mail lista antiga</button>
							@endif
						</fieldset>
						<form action="{{ url('api/lista/importar') }}" method="post" class="border col-md-12 form-invite-upload">
							<label class="col-md-8">Já tem todos esse email digitados em um arquivo .txt?</label>
							<input type="file" name="arquivos" class="upload-text" data-festa-id="{{ $party->id }}" data-preview-file-type="text" />
						</form>
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
								<a href="{{ route('notificacoes.submeter', $party->id) }}" class="col-md-12 form-invite-button btn">Enviar</a>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="inviteList" tabindex="-1" role="dialog" aria-labelledby="inviteListLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="inviteListLabel">E-mail lista antiga</h4>
				</div>
				<table class="modal-body table table-responsive table-striped">
					<thead>
						<tr>
							<td>Aniversariante</td>
							<td>Data da festa</td>
							<td>Ações</td>
						</tr>
					</thead>
					<tbody class="invite-list-body">
						<tr>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
