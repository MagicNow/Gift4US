@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_passo4.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="dados row col-md-offset-2">
				@if ($errors->any())
					<div class="notify hidden" data-type="danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="4">
					<input type="hidden" name="layout_id" value="{{ isset($festa->layout_id) ? $festa->layout_id : NULL }}" class="form-birthday-layout-id">

					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif

					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12">
							<div class="form-birthday-layouts-container {{ isset($festa->layout_id) ? 'hidden' : NULL }}">
								<p class="text-center form-birthday-layouts-text">Escolha abaixo o layout que mais gosta para ser a página oficial do aniversariante</p>
								<ul class="form-birthday-layouts row">
									<li class="form-birthday-layouts-item col-md-4">
										<a href="{{ route('usuario.meus-aniversarios.preview', [ $festa->id, 1 ]) }}" class="form-birthday-layouts-preview red">Ver</a>
										<span class="form-birthday-layouts-icon red"></span>
										<button type="button" class="form-birthday-layouts-choise red" data-color="red">Escolher</button>
									</li>
									<li class="form-birthday-layouts-item col-md-4">
										<a href="{{ route('usuario.meus-aniversarios.preview', [ $festa->id, 2 ]) }}" class="form-birthday-layouts-preview orange">Ver</a>
										<span class="form-birthday-layouts-icon orange"></span>
										<button type="button" class="form-birthday-layouts-choise orange" data-color="orange">Escolher</button>
									</li>
									<li class="form-birthday-layouts-item col-md-4">
										<a href="{{ route('usuario.meus-aniversarios.preview', [ $festa->id, 3 ]) }}" class="form-birthday-layouts-preview blue">Ver</a>
										<span class="form-birthday-layouts-icon blue"></span>
										<button type="button" class="form-birthday-layouts-choise blue" data-color="blue">Escolher</button>
									</li>
								</ul>
							</div>
							<div class="form-birthday-choise-container {{ isset($festa->layout_id) ? NULL : 'hidden' }}">
								<p class="text-center form-birthday-layouts-text">Layout escolhido para página oficial do aniversariante</p>
								@if (isset($festa->layout_id))
									<?php
									switch ($festa->layout_id) {
										case 1:
											$color = 'red';
											break;
										case 2:
											$color = 'orange';
											break;
										case 3:
											$color = 'blue';
											break;
									}
									?>
								@else
									<?php $color = ''; ?>
								@endif
								<div class="form-birthday-layouts row">
									<div class="form-birthday-layouts-item col-md-4 col-md-offset-4">
										<a href="{{ route('usuario.meus-aniversarios.preview', [ $festa->id, $festa->layout_id ]) }}" class="form-birthday-layouts-preview {{ $color }}">Ver</a>
										<span class="form-birthday-layouts-icon {{ $color }}"></span>
										<button type="button" class="form-birthday-layouts-swap {{ $color }}">Trocar</button>
									</div>
								</div>
							</div>

							<div class="form-birthday-layouts-choise-modal hidden">
								<p class="form-birthday-layouts-choise-modal-text">Escolher esse layout</p>
								<span class="form-birthday-layouts-icon blue"></span>
								<div class="row form-birthday-layouts-choise-modal-buttons">
									<button type="button" class="form-birthday-layouts-choise-modal-button form-birthday-choise-modal-confirm blue" data-color="blue">CONFIRMAR</button>
									<button type="button" class="form-birthday-layouts-choise-modal-button form-birthday-choise-modal-cancel blue">CANCELAR</button>
								</div>
							</div>
						</fieldset>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 1]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 2]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 3]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="submit" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
						<a href="{{ route('usuario.meus-aniversarios.novo.festa', [$festa->id, 3]) }}" class="form-birthday-submit" style="text-align: center; color: #acacac; font-size: 17px;margin-top: -30px;">voltar a etapa anterior</a>
			
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection