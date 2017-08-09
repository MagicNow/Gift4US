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

				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container" novalidate>
					<input type="hidden" name="foto" class="aniver-photo" value="{{ old('foto', $festa->foto) }}">
					<input type="hidden" name="step" value="1">
					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif
					<div class="form-birthday-modal hidden">
						<a href="#" class="form-birthday-modal-close"></a>
						<input class="form-birthday-file file-loading" type="file" name="file" data-show-preview="false">
						<p class="form-birthday-modal-text">agora não, vou inserir a foto depois</p>
					</div>
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class="form-group">
								<label for="aniver-nome">Qual nome do aniversáriante?</label>
								<input type="text" class="form-control form-input" id="aniver-nome" name="nome" maxlength="100" value="{{ old('nome', $festa->nome) }}" tabindex="1">
							</div>
							<div class="form-group">
								<p class="defaut-text">Qual o sexo do aniversáriante?</p>
								<label class="checkbox-inline pd0">
									<input type="radio" id="sexo-sim" value="masculino" name="sexo" {{ $festa->sexo == 'masculino' ? 'checked' : '' }}> Masculino
								</label>
								<label class="checkbox-inline">
									<input type="radio" id="sexo-nao" value="feminino" name="sexo" {{ $festa->sexo == 'feminino' ? 'checked' : '' }}> Feminino
								</label>
							</div>
							<div class="form-group">
								<label for="aniver-anos">Quantos anos irá fazer?</label>
								<div class="form-inline">
									<input type="number" name="idade_anos" class="form-control form-input form-birthday-years" id="aniver-anos" value="{{ old('idade_anos', $festa->idade_anos) }}" min="0" max="99" tabindex="2">
									<label class="control-label form-birthday-separator">anos</label>
									<input type="number" name="idade_meses" class="form-control form-input form-birthday-years" value="{{ old('idade_meses', $festa->idade_meses) }}" min="0" max="12" tabindex="3">
									<label class="control-label form-birthday-separator">meses</label>
								</div>
							</div>
							<div class="form-group">
								<label for="aniver-data">Qual a data da festa?</label>
								<div class="form-inline">
									<input type="number" name="festa_dia" class="form-control form-input form-birthday-date-day" id="aniver-data" value="{{ old('festa_dia', $festa->festa_dia) }}" min="0" max="31" tabindex="4">
									<label class="control-label form-birthday-separator">/</label>
									<input type="number" name="festa_mes" class="form-control form-input form-birthday-date-month" value="{{ old('festa_mes', $festa->festa_mes) }}" min="0" max="12" tabindex="5">
									<label class="control-label form-birthday-separator">/</label>
									<input type="number" name="festa_ano" class="form-control form-input form-birthday-date-year" value="{{ old('festa_ano', $festa->festa_ano) }}" min="0" max="2020" tabindex="6">
									<button type="button" class="form-birthday-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></button>
								</div>
							</div>
							<div class="form-group">
								<label for="aniver-horario">Qual horário da festa?</label>
								<div class="form-inline">
									<input type="number" name="festa_hora" class="form-control form-input form-birthday-time" id="aniver-horario" value="{{ old('festa_hora', $festa->festa_hora) }}" min="0" max="24" tabindex="7">
									<span class="control-label form-birthday-separator">:</span>
									<input type="number" name="festa_minuto" class="form-control form-input form-birthday-time" value="{{ old('festa_minuto', $festa->festa_minuto) }}" min="0" max="60" tabindex="8">
								</div>
							</div>
						</fieldset>
						<fieldset class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-1">
							<div class="text-center">
								<span class="usuario-form-header-text">Insira uma foto bem bonita do aniversariante!</span>
								<a class="form-birthday-photo" href="{{ route('usuario.meus-aniversarios.novo') }}">
									@if (isset($festa->foto) && !empty($festa->foto))
										<img src="{{ asset('storage/birthdays/' . $festa->foto) }}">
									@else
										<img src="{{ asset("assets/site/images/bt_inserirfoto.png") }}">
									@endif
								</a>
							</div>
							<div class="form-birthday-presence">
								<p class="defaut-text">Gostaria que os convidados confirmassem presença?</p>
								<label class="checkbox-inline pd0">
									<input type="radio" id="presenca-sim" value="1" name="confirma_presenca" {{ $festa->confirma_presenca == 1 ? 'checked' : '' }}> Sim
								</label>
								<label class="checkbox-inline">
									<input type="radio" id="presenca-nao" value="0" name="confirma_presenca" {{ $festa->confirma_presenca == 0 ? 'checked' : '' }}> Não
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
