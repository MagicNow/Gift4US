@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo3.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="4">
					<input type="hidden" name="layout_id" value="1">
					<input type="hidden" name="receber_recados" value="1">
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12">
							<img src="{{ asset('assets/site/images/passo_4.png') }}" class="img1" style="margin: -20px auto 0; display: block;">
							<img src="{{ asset('assets/site/images/passo_4_escolha.png') }}" class="img2 hidden" style="margin: -20px auto 0; display: block;">

							<div id="buttons1">
								<button type="button" data-toggle="modal" data-target="#preview-blue" style="position: absolute; left: 60px; top: 107px; width: 51px; height: 28px; background-color: transparent; border: 0 none; outline: 0;"></button>
								<button type="button" data-toggle="modal" data-target="#preview-blue" style="position: absolute; left: 360px; top: 107px; width: 51px; height: 28px; background-color: transparent; border: 0 none; outline: 0;"></button>
								<button type="button" data-toggle="modal" data-target="#preview-blue" style="position: absolute; left: 657px; top: 107px; width: 51px; height: 28px; background-color: transparent; border: 0 none; outline: 0;"></button>

								<button type="button" style="position: absolute; left: 229px; top: 107px; width: 80px; height: 28px; background-color: transparent; border: 0 none; outline: 0;" onclick="$('.img1').addClass('hidden');$('.img2').removeClass('hidden');$('#buttons1').hide();$('#buttons2').show();"></button>
								<button type="button" style="position: absolute; left: 527px; top: 107px; width: 80px; height: 28px; background-color: transparent; border: 0 none; outline: 0;" onclick="$('.img1').addClass('hidden');$('.img2').removeClass('hidden');$('#buttons1').hide();$('#buttons2').show();"></button>
								<button type="button" style="position: absolute; left: 824px; top: 107px; width: 80px; height: 28px; background-color: transparent; border: 0 none; outline: 0;" onclick="$('.img1').addClass('hidden');$('.img2').removeClass('hidden');$('#buttons1').hide();$('#buttons2').show();"></button>
							</div>
							<div id="buttons2" style="display: none;">
								<button type="button" data-toggle="modal" data-target="#preview-blue" style="position: absolute; left: 360px; top: 107px; width: 51px; height: 28px; background-color: transparent; border: 0 none; outline: 0;"></button>
	
								<button type="button" style="position: absolute; left: 527px; top: 107px; width: 80px; height: 28px; background-color: transparent; border: 0 none; outline: 0;" onclick="$('.img2').addClass('hidden');$('.img1').removeClass('hidden');$('#buttons2').hide();$('#buttons1').show();"></button>
							</div>
						</fieldset>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="submit" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
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