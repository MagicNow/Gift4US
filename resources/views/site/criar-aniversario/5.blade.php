@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo5.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados step5 row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="5">

					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif

					<fieldset class="form-birthday-first col-xs-12 col-sm-12" style="margin-bottom: 50px;">
						<div class="clearfix">

							<p class="text-center my-birthday-title">Quais tipos de presente você quer listar?</p>
							<div class="row">
								<div class="col-md-4 form-birthday-gift-column">
									<a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $festa->id) }}" class="form-birthday-gift-link"><span class="icon form-birthday-gift-toy">BRINQUEDOS</span>Crie uma lista de interesses e a partir dela uma lista de brinquedos que o aniversariante gostaria de ganhar.</a>
									<span class="form-birthday-gift-count {{ $gifts['toys'] > 0 ? 'active' : '' }}"><i></i>{{ sprintf("%02d", $gifts['toys']) }} na lista de presentes</span>
								</div>
								<div class="col-md-4 form-birthday-gift-column">
									<a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $festa->id) }}" class="form-birthday-gift-link"><span class="icon form-birthday-gift-clothes">ROUPAS</span>Crie uma lista de roupas que o aniversariante gostaria de ganhar. As roupas adquiridas diretamente no site serão revertidas em dinheiro na sua conta.</a>
									<span class="form-birthday-gift-count {{ $gifts['clothes'] > 0 ? 'active' : '' }}"><i></i>{{ sprintf("%02d", $gifts['clothes']) }} na lista de presentes</span>
								</div>
								<div class="col-md-4 form-birthday-gift-column">
									<a href="#" class="form-birthday-gift-link"><span class="icon form-birthday-gift-quotas">COTAS</span>Os convidados podem presentear financiando pequenas partes de um valor total. Pode ser a própria festa por exemplo!</a>
									<span class="form-birthday-gift-count {{ $gifts['quotas'] > 0 ? 'active' : '' }}"><i></i>{{ sprintf("%02d", $gifts['quotas']) }} na lista de presentes</span>
								</div>
							</div>
						</div>
					</fieldset>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 1]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 2]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 3]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 4]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"></li>
						</ul>
					</nav>
					<a href="{{ route('usuario.meus-aniversarios.novo.festa', [$festa->id, 4]) }}" class="form-birthday-submit" style="text-align: center; color: #acacac; font-size: 17px;">voltar a etapa anterior</a>
				</form>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="preview-blue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="form-birthday-preview" role="document">
			<div class="modal-content">
				<button type="button" class="close form-birthday-preview-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<img src="{{ asset('assets/site/images/passo_4_preview_azul.jpg') }}" class="form-birthday-preview-image">
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection