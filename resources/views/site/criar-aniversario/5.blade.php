@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo3.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.store5') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="5">
					<fieldset class="form-birthday-first col-xs-12 col-sm-12" style="margin-bottom: 50px;">
						<div class="clearfix">
							<img src="{{ asset('assets/site/images/passo_5_titulo.png') }}" style="margin: -60px auto 0; display: block;">
							<div class="row">
								<div class="col-md-4">
									<a href="#"><img src="{{ asset('assets/site/images/passo_5_item_1.png') }}"></a>
								</div>
								<div class="col-md-4">
									<a href="{{ route('usuario.meus-aniversarios.presentes.roupas') }}"><img src="{{ asset('assets/site/images/passo_5_item_2.png') }}"></a>
								</div>
								<div class="col-md-4">
									<a href="#"><img src="{{ asset('assets/site/images/passo_5_item_3.png') }}"></a>
								</div>
							</div>
						</div>
					</fieldset>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item active"></li>
						</ul>
					</nav>
					<a href="{{ route('usuario.meus-aniversarios.novo', 4) }}" class="form-birthday-submit" style="text-align: center; color: #acacac; font-size: 17px;">voltar a etapa anterior</a>
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