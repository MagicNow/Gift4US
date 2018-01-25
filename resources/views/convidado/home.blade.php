@extends('convidado/master')
@section('content')
	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="preview-banner">
			<div class="preview-banner-item">
				<div class="box-preview">
					@foreach (explode(' ', $party->nome) as $nome)
						<span>{{ $nome }}</span>
					@endforeach
				</div>
				@if ($party->foto)
					<div class="box-preview">
						<img src="{{ asset('storage/birthdays/mask/guest/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="Festa" class="preview-banner-item-image" width="240">
					</div>
				@endif
			</div>
		</div>
		<div class="text-center">
			<a href="#" class="preview-more-btn">Clique e saiba tudo sobre a festa!</a>
		</div>

		{{-- @include('convidado.inc.header-inner', $party) --}}

		<div class="preview-header-space">
			<div class="preview-header-container">
				<div class="preview-header">
					<div class="preview-header-decor">
						@if ($party->foto)
							<img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image">
						@endif
					</div>
					<div class="preview-header-name">{{ $party->nome }}</div>
					<div class="preview-header-image-container text-center">
						<div class="preview-header-image-mask">&nbsp;</div>
					</div>
					<div class="preview-header-info">{{ $party->festa_dia }}.{{ $party->festa_mes }} | {{ date ('H:i',strtotime($party->festa_hora . ':' . $party->festa_minuto)) }}<br>
						{{ $party->idade_anos > 1 ? $party->idade_anos . ' anos' : ($party->idade_anos == 1 ? 'ano' : NULL) }}
						{{ $party->idade_meses > 1 ? $party->idade_meses . ' meses' : ($party->idade_meses == 1 ? 'mes' : NULL) }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="control-panel" style="clear:both">
		<img src="{{ asset('assets/site/images/presentinho-preview-1.png') }}" class="preview-presentinho preview-presentinhoHome">
		<div class="preview-header-address">{{ $party->endereco }}</div>
		<div class="preview-container">
			<img src="{{ asset('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
			<ul class="preview-list row">
				@if ($party->confirma_presenca === 1)
					<li class="col-md-3 text-right preview-item-container">
						<a href="#confirmar">
							<div class="preview-item text-center"><img src="{{ asset('assets/site/images/preview-icon-check.png') }}"></div>
							<p class="preview-item-text text-center">CONFIRMAR PRESENÇA</p>
						</a>
					</li>
				@endif
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container">
					<a href="#lista">
						<div class="preview-item text-center">{{ round(($percent['toys'] + $percent['clothes'] + $percent['quotas']) / 3) }}%</div>
						<p class="preview-item-text text-center">LISTA DE PRESENTES DISPONÍVEIS</p>
					</a>
				</li>
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container ">
					<a href="#recado">
						<div class="preview-item text-center"><img src="{{ asset('assets/site/images/preview-icon-pin.png') }}"></div>
						<p class="preview-item-text text-center">ESCREVA UM RECADO</p>
					</a>
				</li>
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container ">
					<a href="#mapa">
						<div class="preview-item text-center"><img src="{{ asset('assets/site/images/preview-icon-map.png') }}"></div>
						<p class="preview-item-text text-center">CLIQUE PARA VER O MAPA</p>
					</a>
				</li>
			</ul>
			<div class="preview-advertising">
				<span class="preview-advertising-btn">Publicidade</span>
			</div>
		</div>
	</div>

	@if ($party->confirma_presenca === 1)
		<div class="rsvp">
			<a name="confirmar"></a>
			
			{{-- @include('convidado.inc.header-inner', $party) --}}
			<div class="preview-header-space"></div>
			<div class="sub-menu-container">
				<div class="sub-menu text-center">
					@if ($party->confirma_presenca === 1)
						<a class="confirm-btn {{-- active --}}" href="#confirmar"><img src="{{ asset('assets/site/images/img-check-out.png') }}" alt="" /></a>
					@endif
					<a class="gifts-btn" href="#lista">
					    <img src="{{ asset('assets/site/images/img-presente-out.png') }}" class="img-blue" alt="" />
						<img src="{{ asset('assets/site/images/img-presente-out-orange.png') }}" class="img-orange" alt="" />
						<img src="{{ asset('assets/site/images/img-presente-out-red.png') }}" class="img-red" alt="" />
					</a>
					<a class="message-btn" href="#recado">
					    <img src="{{ asset('assets/site/images/img-mensagem-out.png') }}" class="img-blue" alt="" />
						<img src="{{ asset('assets/site/images/img-mensagem-out-orange.png') }}" alt="" class="img-orange" />
						<img src="{{ asset('assets/site/images/img-mensagem-out-red.png') }}" alt="" class="img-red" />
					</a>
					<a class="map-btn" href="#mapa">
					    <img src="{{ asset('assets/site/images/img-maps-out.png') }}" class="img-blue" alt="" />
						<img src="{{ asset('assets/site/images/img-maps-out-orange.png') }}" class="img-orange" alt="" />
						<img src="{{ asset('assets/site/images/img-maps-out-red.png') }}" class="img-red" alt="" />
					</a>
				</div>
			</div>
		</div>
		<div class="boxfL">
			<img src="{{ asset('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
			<img src="{{ asset('assets/site/images/img-balao-check.png') }}" align="right" />
		</div>
		<form class="boxfR rsvp-form" action="{{ route('convidado.confirmar-presenca', $party->slug) }}" method="post">
			<fieldset class="col-md-12">
				<div class="rsvp-form-content">
					<div class="form-group">
						<input type="text" name="nome" id="rsvp-nome" class="form-control form-input" placeholder="nome" required maxlength="100">
					</div>
					<div class="form-group">
						<input type="email" name="email" id="rsvp-email" class="form-control form-input" placeholder="e-mail" required maxlength="255">
					</div>
					<div class="form-group form-rsvp-guests-container">
						<select name="numero_pessoas" class="form-control form-rsvp-guests-input" id="rsvp-guests" required>
							<option value="" selected disabled>Quantas pessoas irão na festa?</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</div>
					<p class="text-left">Quero fazer a confirmação de presença <button type="submit" class="enviar rsvp-form-enviar"> Enviar</button></p>
				</div>
			</fieldset>
		</form>
		<br clear="all" />
	@endif

	<div class="rsvp">
		<a name="lista"></a>

		<div class="preview-header-space"></div>
		{{-- @include('convidado.inc.header-inner', $party) --}}
	</div>
	<div class="presente">
		<ul class="preview-list row">
			<li class="col-md-4 preview-item-container text-center">
				<img src="{{ asset('assets/site/images/bg-presente.png') }}" alt="" class="bg" />
				<div class="preview-item-toys"></div>
				<p class="preview-item-text text-center">BRINQUEDOS</p>
				<p class="text-center desc"><a href="{{ route('convidado.brinquedos.index', $party->slug) }}">Clique aqui para ver a lista completa dos brinquedos prediletos escolhidos pelo aniversariante!</a></p>
				<div class="porcentagem">
					<span style="width:{{ $percent['toys'] }}%"></span>
					<strong>{{ $percent['toys'] }}% disponivel</strong>
				</div>
			</li>
			<li class="col-md-4 text-center preview-item-container">
				<div class="preview-item-clothes text-center"></div>
				<p class="preview-item-text text-center">ROUPAS</p>
				<p class="text-center desc"><a href="{{ route('convidado.roupas.index', $party->slug) }}">Clique aqui para ver a lista de roupas que o aniversariante quer ganhar!</a></p>
				<div class="porcentagem">
					<span style="width:{{ $percent['clothes'] }}%"></span>
					<strong>{{ $percent['clothes'] }}% disponivel</strong>
				</div>
			</li>
			<li class="col-md-4 text-center preview-item-container ">
				<div class="preview-item-quota text-center"></div>
				<p class="preview-item-text text-center">COTAS</p>
				<p class="text-center desc"><a href="{{ route('convidado.cotas.index', $party->slug) }}">Clique aqui para presentear com parte da cota e ajudar naquele presentão!</a></p>
				<div class="porcentagem">
					<span style="width:{{ $percent['quotas'] }}%"></span>
					<strong>{{ $percent['quotas'] }}% disponivel</strong>
				</div>
			</li>
		</ul>
	</div>
	<br clear="all" />
	<div class="rsvp">
		<a name="recado"></a>

		<div class="preview-header-space"></div>
		{{-- @include('convidado.inc.header-inner', $party) --}}

		{{-- <div class="sub-menu text-center">
			@if ($party->confirma_presenca === 1)
				<a class="confirm-btn active" href="#confirmar"><img src="{{ asset('assets/site/images/img-check-out.png') }}" alt="" /></a>
			@endif
			<a class="gifts-btn" href="#lista">
			<img src="{{ asset('assets/site/images/img-presente-out.png') }}" class="img-blue" alt="" />
			<img src="{{ asset('assets/site/images/img-presente-out-orange.png') }}" class="img-orange" alt="" />
			<img src="{{ asset('assets/site/images/img-presente-out-red.png') }}" class="img-red" alt="" />
			</a>
			<a class="message-btn" href="#recado"><img src="{{ asset('assets/site/images/img-mensagem-in.png') }}" alt="" /></a>
			<a class="map-btn" href="#mapa">
		    <img src="{{ asset('assets/site/images/img-maps-out.png') }}" class="img-blue" alt="" />
			<img src="{{ asset('assets/site/images/img-maps-out-orange.png') }}" class="img-orange" alt="" />
			<img src="{{ asset('assets/site/images/img-maps-out-red.png') }}" class="img-red" alt="" />
			</a>
		</div> --}}
	</div>
	<div class="mensagem">
		<form class="boxfL rsvp-form" action="{{ route('convidado.escrever-mensagem', $party->slug) }}" method="post">
			<fieldset class="col-md-12 img-field">
				<div class="rsvp-form-content">
					<p class="text-left">Escreva uma mensagem</p>
					<div class="form-group">
						<input type="text" name="nome" id="msg-nome" class="form-control form-input" placeholder="nome">
					</div>
					<div class="form-group">
						<textarea name="mensagem" id="msg-mensagem" class="form-control form-input" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
					</div>
					<button type="submit" class="enviar msg-form-enviar"> Enviar</button>
				</div>
			</fieldset>
		</form>
		<div class="boxfR">
			<div class="preview-advertising">
				<span class="preview-advertising-btn">Publicidade</span>
			</div>
		</div>
	</div>
	<br clear="all" />
	<div class="rsvp">
		<a name="mapa"></a>

		<div class="preview-header-space"></div>
		{{-- @include('convidado.inc.header-inner', $party) --}}

		{{-- <div class="sub-menu text-center">
			@if ($party->confirma_presenca === 1)
				<a class="confirm-btn active" href="#confirmar"><img src="{{ asset('assets/site/images/img-check-out.png') }}" alt="" /></a>
			@endif
			
			<a class="gifts-btn" href="#lista">
			<img src="{{ asset('assets/site/images/img-presente-out.png') }}" class="img-blue" alt="" />
			<img src="{{ asset('assets/site/images/img-presente-out-orange.png') }}" class="img-orange" alt="" />
			<img src="{{ asset('assets/site/images/img-presente-out-red.png') }}" class="img-red" alt="" />
			</a>
			<a class="message-btn" href="#recado">
		    <img src="{{ asset('assets/site/images/img-mensagem-out.png') }}" class="img-blue" alt="" />				
			<img src="{{ asset('assets/site/images/img-mensagem-out-orange.png') }}" alt="" class="img-orange" />
			<img src="{{ asset('assets/site/images/img-mensagem-out-red.png') }}" alt="" class="img-red" />
			</a>
			<a class="map-btn" href="#mapa"><img src="{{ asset('assets/site/images/img-maps-in.png') }}" alt="" /></a>
		</div> --}}
	</div>
	<div class="maps">
		<div class="container clearfix">
			<div class="location">
				<div class="where">
					<h3>Onde?</h3>
					<p>{{ $party->endereco }}</p>
					@if (!empty($party->observacoes))
						<h3>Observações:</h3>
						<p>{{ $party->observacoes }}</p>
					@endif
				</div>
				<div class="g-maps">
					<iframe src="http://maps.google.com/maps?q={{ $party->endereco_latitude }},{{ $party->endereco_longitude }}&z=15&output=embed" width="465" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
@section('scripts')
@endsection