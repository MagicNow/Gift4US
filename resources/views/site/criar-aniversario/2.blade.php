@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_criando.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.novo', 3) }}" method="post" class="dados-container">
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class="form-group">
								<label for="aniver-endereco">Qual o endereço da festa?</label>
								<input type="text" class="form-control form-input" id="aniver-endereco" name="endereco">
							</div>
							<div class="form-group">
								<label for="aniver-referencia">Quer inserir um ponto de referência? (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-referencia" name="referencia">
							</div>
							<div class="form-group">
								<label for="aniver-observacoes">Observações gerais (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-observacoes" name="observacoes">
							</div>
						</fieldset>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="button" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
				</form>
			</div>
		</div>
	</div>
@endsection
