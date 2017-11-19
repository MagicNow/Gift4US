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
									<a href="{{ url()->previous() }}" class="btn-back">Voltar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="lista-email">
						<h5 class="title">Email</h5>
						<h5>Adicionar emails</h5>
						<fieldset class="col-md-12">
							<input class="texto col-md-8" type="text" placeholder="escreva aqui o e-mail do convidado" value="" />
							<button class="col-md-4 adicionar-email" type="button">Adicionar</button>
						</fieldset>
						<fieldset class="col-md-12">
							<label class="col-md-8">Quer adicionar algum email que esteja em uma lista antiga?</label>
							<button class="col-md-4 bgC" type="button">E-mail lista antiga</button>
						</fieldset>
						<fieldset class="border col-md-12">
							<label class="col-md-8">Já tem todos esse email digitados em um arquivo .txt?</label>
							<button class="col-md-4 gifts-item-price-description-upload" type="button">Upload .txt</button>
							<input type="file" name="arquivos" class="upload-image" accept="text/plain" />
						</fieldset>
						<ul class="col-md-12">
						</ul>
						<fieldset class="bottom col-md-12">
							<div>
								<label class="col-md-12">0 emails cadastrados</label>
								<button class="col-md-12" type="button">Enviar</button>
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
