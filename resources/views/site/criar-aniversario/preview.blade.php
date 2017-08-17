@extends('site/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12 {{ $layout->class }}">
		<img src="{{ url('assets/site/images/presentinho-preview-1.png') }}" class="preview-presentinho">

		<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 4]) }}" class="btn-blue preview-back-btn">VOLTAR PARA ESCOLHA DE LAYOUT</a>

		<div class="preview-header-left"></div>
		<div class="preview-header">
			<div class="preview-header-decor preview-header-decor-left"></div>
			<div class="preview-header-name">{{ $festa->nome }}</div>
			<div class="preview-header-image-container text-center">
				<div class="preview-header-image-mask">&nbsp;</div>
				<img src="{{ url('storage/birthdays/mask/' . pathinfo($festa->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $festa->nome }}" height="111" class="preview-header-image"></div>
			<div class="preview-header-decor preview-header-decor-right"></div>
		</div>
		<div class="preview-header-right"></div>
		<div class="preview-header-address">{{ $festa->endereco }}</div>

		<div class="preview-container">
			<img src="{{ url('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
			<ul class="preview-list row">
				<li class="col-md-3 preview-item-container">
					<div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-check.png') }}"></div>
					<p class="preview-item-text text-center">CONFIRMAR PRESENÇA</p>
				</li>
				<li class="col-md-3 text-center preview-item-container">
					<div class="preview-item text-center">57%</div>
					<p class="preview-item-text text-center">LISTA DE PRESENTES DISPONÍVEIS</p>
				</li>
				<li class="col-md-3 text-center preview-item-container ">
					<div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-pin.png') }}"></div>
					<p class="preview-item-text text-center">ESCREVA UM RECADO</p>
				</li>
				<li class="col-md-3 text-right preview-item-container ">
					<div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-map.png') }}"></div>
					<p class="preview-item-text text-center">CLIQUE PARA VER O MAPA</p>
				</li>
			</ul>
			<div class="preview-advertising">
				<span class="preview-advertising-btn">Publicidade</span>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection