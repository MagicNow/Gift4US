@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo3.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="3">
					<input type="hidden" name="tamanho_camiseta" value="P">
					<input type="hidden" name="tamanho_calca" value="M">
					<input type="hidden" name="tamanho_sapato" value="37">
					<input type="hidden" name="observacoes_2" value="">

					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif

					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-4 col-sm-4">
							<div class="radio">
								<label data-image="bebe-menina.png">
									<input type="radio" name="ciclo_vida" value="Bebê" checked="checked"><span></span> Bebê
								</label>
							</div>
							<div class="radio">
								<label data-image="crianca-menina.png">
									<input type="radio" name="ciclo_vida" value="Criança"><span></span> Criança
								</label>
							</div>
							<div class="radio">
								<label data-image="adolescente-menina.png">
									<input type="radio" name="ciclo_vida" value="Adolescente"><span></span> Adolescente
								</label>
							</div>
						</fieldset>
						<div class="form-birthday-first col-xs-8 col-sm-8">
							<img src="{{ asset('assets/site/images/avatar/bebe-menina.png') }}">
						</div>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 1]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 2]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
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