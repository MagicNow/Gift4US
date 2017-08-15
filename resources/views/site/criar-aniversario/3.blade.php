@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo3.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

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

				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="3">

					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif

					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-4 col-sm-4">
							<div class="radio">
								<label data-image="{{ asset('assets/site/images/avatar/bebe-' . $festa->sexo . '.png') }}" class="form-birthday-sex-label">
									<input type="radio" name="ciclo_vida" value="Bebê" {{ (isset($festa->ciclo_vida) && $festa->ciclo_vida == 'Bebê') || empty($festa->ciclo_vida) ? 'checked="checked"' : '' }}><span></span> Bebê
								</label>
							</div>
							<div class="radio">
								<label data-image="{{ asset('assets/site/images/avatar/crianca-' . $festa->sexo . '.png') }}" class="form-birthday-sex-label">
									<input type="radio" name="ciclo_vida" value="Criança" {{ isset($festa->ciclo_vida) && $festa->ciclo_vida == 'Criança' ? 'checked="checked"' : '' }}><span></span> Criança
								</label>
							</div>
							<div class="radio">
								<label data-image="{{ asset('assets/site/images/avatar/adolescente-' . $festa->sexo . '.png') }}" class="form-birthday-sex-label">
									<input type="radio" name="ciclo_vida" value="Adolescente" {{ isset($festa->ciclo_vida) && $festa->ciclo_vida == 'Adolescente' ? 'checked="checked"' : '' }}><span></span> Adolescente
								</label>
							</div>
						</fieldset>
						<div class="col-xs-7 col-sm-7">
							<div class="row">
								<div class="col-md-7 form-birthday-size-column">
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-camiseta" class="form-birthday-size-label">Camiseta, regata, camisa e etc.</label>
										<select name="tamanho_camiseta" class="form-control form-birthday-size-input" id="aniver-tamanho-camiseta">
											<option value="" disabled>Clique para escolher o tamanho</option>
											<option value="P" {{ $festa->tamanho_camiseta == 'P' ? 'selected' : '' }}>P</option>
											<option value="M" {{ $festa->tamanho_camiseta == 'M' ? 'selected' : '' }}>M</option>
											<option value="G" {{ $festa->tamanho_camiseta == 'G' ? 'selected' : '' }}>G</option>
										</select>
									</div>
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-calca" class="form-birthday-size-label">Calça, bermuda, shorts e etc.</label>
										<select name="tamanho_calca" class="form-control form-birthday-size-input" id="aniver-tamanho-calca">
											<option value="" disabled>Clique para escolher o tamanho</option>
											<option value="P" {{ $festa->tamanho_calca == 'P' ? 'selected' : '' }}>P</option>
											<option value="M" {{ $festa->tamanho_calca == 'M' ? 'selected' : '' }}>M</option>
											<option value="G" {{ $festa->tamanho_calca == 'G' ? 'selected' : '' }}>G</option>
										</select>
									</div>
									<div class="form-group form-birthday-size-container">
										<label for="aniver-tamanho-sapato" class="form-birthday-size-label">Sapato, chuteira, chinelo e etc.</label>
										<select name="tamanho_sapato" class="form-control form-birthday-size-input" id="aniver-tamanho-sapato">
											<option value="" disabled>Clique para escolher o tamanho</option>
											<option value="35" {{ $festa->tamanho_sapato == '35' ? 'selected' : '' }}>35</option>
											<option value="36" {{ $festa->tamanho_sapato == '36' ? 'selected' : '' }}>36</option>
											<option value="37" {{ $festa->tamanho_sapato == '37' ? 'selected' : '' }}>37</option>
											<option value="38" {{ $festa->tamanho_sapato == '38' ? 'selected' : '' }}>38</option>
											<option value="39" {{ $festa->tamanho_sapato == '39' ? 'selected' : '' }}>39</option>
											<option value="40" {{ $festa->tamanho_sapato == '40' ? 'selected' : '' }}>40</option>
											<option value="41" {{ $festa->tamanho_sapato == '41' ? 'selected' : '' }}>41</option>
											<option value="42" {{ $festa->tamanho_sapato == '42' ? 'selected' : '' }}>42</option>
										</select>
									</div>
								</div>
								<div class="col-md-5">
									@if (isset($festa->ciclo_vida) && !empty($festa->ciclo_vida))
										<img src="{{ asset('assets/site/images/avatar/' . Helper::stripAccents(strtolower($festa->ciclo_vida)) . '-' . $festa->sexo . '.png') }}" class="form-birthday-avatar">
									@else
										<img src="{{ asset('assets/site/images/avatar/bebe-' . $festa->sexo . '.png') }}" class="form-birthday-avatar">
									@endif
								</div>
							</div>
						</div>
					</div>

					<div class="clearfix">
						<div class="col-md-8">
							<div class="form-group">
								<label for="aniver-observacoes">Observações gerais (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-observacoes" name="observacoes_2" value="{{ old('nome', $festa->observacoes_2) }}">
							</div>
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