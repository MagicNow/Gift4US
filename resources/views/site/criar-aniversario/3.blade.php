@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo3.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.novo', 4) }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="3">
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12">
							<img src="{{ asset('assets/site/images/passo_3.png') }}" style="margin-top: -60px;">
						</fieldset>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="submit" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection