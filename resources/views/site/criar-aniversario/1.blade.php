@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_criando.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('usuario.meus-aniversarios.store1') }}" method="post" class="dados-container" novalidate>
					<input type="hidden" name="foto" class="aniver-photo">
					<input type="hidden" name="step" value="1">
					<div class="form-birthday-modal hidden">
						<a href="#" class="form-birthday-modal-close"></a>
						<input class="form-birthday-file file-loading" type="file" name="file" data-show-preview="false">
						<p class="form-birthday-modal-text">agora não, vou inserir a foto depois</p>
					</div>
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class="form-group">
								<label for="aniver-nome">Qual nome do aniversáriante?</label>
								<input type="text" class="form-control form-input" id="aniver-nome" name="nome" maxlength="100" value="{{ old('nome') }}">
							</div>
							
							<div class="form-group">
								<label for="aniver-anos">Quantos anos irá fazer?</label>
								<div class="form-inline">
									<input type="number" name="idade_anos" class="form-control form-input form-birthday-years" id="aniver-anos" value="{{ old('idade_anos') }}">
									<label class="control-label form-birthday-separator">anos</label>
									<input type="number" name="idade_meses" class="form-control form-input form-birthday-years" value="{{ old('idade_meses') }}">
									<label class="control-label form-birthday-separator">meses</label>
								</div>
							</div>
							<div class="form-group">
								<label for="aniver-data">Qual a data da festa?</label>
								<div class="form-inline">
									<input type="number" name="festa_dia" class="form-control form-input form-birthday-date-day" id="aniver-data" value="{{ old('festa_dia') }}">
									<label class="control-label form-birthday-separator">/</label>
									<input type="number" name="festa_mes" class="form-control form-input form-birthday-date-month" value="{{ old('festa_mes') }}">
									<label class="control-label form-birthday-separator">/</label>
									<input type="number" name="festa_ano" class="form-control form-input form-birthday-date-year" value="{{ old('festa_ano') }}">
									<button type="button" class="form-birthday-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></button>
								</div>
							</div>
							<div class="form-group">
								<label for="aniver-horario">Qual horário da festa?</label>
								<div class="form-inline">
									<input type="number" name="festa_hora" class="form-control form-input form-birthday-time" id="aniver-horario" value="{{ old('festa_hora') }}">
									<span class="control-label form-birthday-separator">:</span>
									<input type="number" name="festa_minuto" class="form-control form-input form-birthday-time" value="{{ old('festa_minuto') }}">
								</div>
							</div>
						</fieldset>
						<fieldset class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-1">
							<div class="text-center">
								<span class="usuario-form-header-text">Insira uma foto bem bonita do aniversariante!</span>
								<a class="form-birthday-photo" href="{{ route('usuario.meus-aniversarios.novo') }}"><img src="{{ asset("assets/site/images/bt_inserirfoto.png") }}"></a>
							</div>
							<div class="form-birthday-presence">
								<p class="defaut-text">Gostaria que os convidados confirmassem presença?</p>
								<label class="checkbox-inline pd0">
									<input type="radio" id="presenca-sim" value="1" name="confirma_presenca" checked> Sim
								</label>
								<label class="checkbox-inline">
									<input type="radio" id="presenca-nao" value="0" name="confirma_presenca"> Não
								</label>
							</div>
						</fieldset>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
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
