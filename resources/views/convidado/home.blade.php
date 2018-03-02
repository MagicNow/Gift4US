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
						<a href="#confirmar" data-target="confirm-btn" class="preview-list-button">
							<div class="preview-item text-center"><img src="{{ asset('assets/site/images/preview-icon-check.png') }}"></div>
							<p class="preview-item-text text-center">CONFIRMAR PRESENÇA</p>
						</a>
					</li>
				@endif
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container">
					<a href="#lista" data-target="gifts-btn" class="preview-list-button">
						<div class="preview-item text-center">{{ round(($percent['toys'] + $percent['clothes'] + $percent['quotas']) / 3) }}%</div>
						<p class="preview-item-text text-center">LISTA DE PRESENTES DISPONÍVEIS</p>
					</a>
				</li>
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container ">
					<a href="#recado" data-target="message-btn" class="preview-list-button">
						<div class="preview-item text-center"><img src="{{ asset('assets/site/images/preview-icon-pin.png') }}"></div>
						<p class="preview-item-text text-center">ESCREVA UM RECADO</p>
					</a>
				</li>
				<li class="{{ $party->confirma_presenca === 1 ? 'col-md-3' : 'col-md-4' }} text-right preview-item-container ">
					<a href="#mapa" data-target="map-btn" class="preview-list-button">
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

	<div class="rsvp menu">
		<a name="confirmar" class="pin-section"></a>
		<div class="sub-menu-container">
			<div class="sub-menu text-center">
				@if ($party->confirma_presenca === 1)
					<a class="confirm-btn pin-button" href="#confirmar" data-href="confirma">
						<svg class="sub-menu-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="58" height="53" viewBox="0 0 58.000000 53.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,53.000000) scale(0.050000,-0.050000)" fill="#ffffff" stroke="none"><path d="M755 809 c-96 -103 -203 -233 -237 -289 l-62 -101 -124 108 -123 109 -45 -77 -44 -77 201 -201 c160 -160 203 -193 213 -166 92 261 177 403 372 614 l127 140 -38 65 c-51 86 -39 92 -240 -125z"/></g></svg>
					</a>
				@endif
				<a class="gifts-btn pin-button" href="#lista" data-href="lista">
					<svg class="sub-menu-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="58" height="53" viewBox="0 0 174.000000 159.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,159.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"><path d="M1123 1509 c-66 -38 -162 -134 -191 -191 -13 -24 -27 -50 -31 -58 -5 -8 -13 -28 -18 -45 -13 -44 -46 -41 -53 5 -6 31 -14 51 -42 100 -4 8 -11 22 -15 30 -25 55 -161 160 -209 160 -13 0 -36 -22 -70 -67 -71 -96 -84 -120 -84 -151 0 -36 57 -92 128 -123 28 -13 51 -28 49 -34 -2 -6 -92 -11 -241 -11 -139 -1 -242 -6 -247 -11 -11 -11 -15 -416 -4 -433 3 -5 21 -10 40 -10 18 0 35 -6 38 -12 5 -16 2 -69 -19 -359 -10 -125 -14 -234 -11 -243 6 -15 67 -16 695 -16 471 0 691 3 699 11 7 7 7 26 2 55 -5 25 -13 136 -19 247 -6 111 -13 216 -16 233 -5 25 -1 35 17 48 13 9 33 16 45 16 12 0 32 8 44 18 22 17 22 23 21 231 0 117 -2 216 -5 218 -3 3 -113 5 -246 4 -203 -2 -240 0 -240 12 0 8 12 23 28 33 57 37 162 167 162 200 0 23 -23 68 -63 122 -47 63 -68 66 -144 21z m102 -79 c4 -6 4 -29 0 -51 -6 -32 -20 -54 -64 -98 -54 -53 -162 -118 -180 -107 -12 8 -2 53 15 67 8 6 14 18 14 25 0 19 131 151 161 163 32 13 47 13 54 1z m-581 -74 c25 -24 53 -60 61 -79 8 -20 19 -38 25 -42 5 -3 10 -15 10 -26 0 -24 -29 -25 -114 -4 -140 36 -161 67 -96 145 23 27 47 50 54 50 7 0 34 -20 60 -44z"/></g></svg>
				</a>
				<a class="message-btn pin-button" href="#recado" data-href="recado">
					<svg class="sub-menu-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="58" height="53" viewBox="0 0 174.000000 159.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,159.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"><path d="M580 1428 c-30 -36 -333 -445 -337 -455 -7 -17 63 -47 127 -53 54 -5 55 -6 134 -95 43 -49 106 -123 138 -163 l58 -73 0 -197 c0 -214 4 -242 29 -242 10 0 88 72 175 160 87 88 164 160 170 160 6 0 79 -68 163 -150 98 -98 158 -150 172 -150 12 0 21 6 21 13 0 7 -70 82 -155 167 -85 85 -155 160 -155 166 0 5 74 84 165 173 91 90 165 169 165 176 0 23 -33 26 -241 24 l-207 -2 -74 64 c-41 35 -95 81 -119 101 -121 101 -129 110 -129 143 0 18 -12 63 -26 101 -14 38 -30 83 -35 101 -12 38 -24 48 -39 31z"/></g></svg>  
				</a>
				<a class="map-btn pin-button" href="#mapa" data-href="mapa">
					<svg class="sub-menu-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="58" height="53" viewBox="0 0 58.000000 53.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,53.000000) scale(0.050000,-0.050000)" fill="#000000" stroke="none"><path d="M448 962 c-156 -71 -212 -199 -160 -370 28 -91 237 -460 273 -483 24-15 254 381 293 504 76 241 -172 455 -406 349z m195 -195 c46 -41 47 -102 4-150 -64 -71 -187 -21 -187 75 0 95 111 141 183 75z"/></g></svg>
				</a>
			</div>
		</div>
	</div>

	<div class="fullpage">
		{{--  <div class="guest-page-content">  --}}
		@if ($party->confirma_presenca === 1)
			<div class="preview-section section-confirma">
				<div class="preview-header-space"></div>
				<div class="boxfL">
					<img src="{{ asset('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
					<img src="{{ asset('assets/site/images/img-balao-check.png') }}" align="right" />
				</div>
				<form class="boxfR rsvp-form" action="{{ route('convidado.confirmar-presenca', $party->codigo) }}" method="post">
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
			</div>
		@endif

		<div class="preview-section section-lista">
			<div class="preview-header-space"></div>
			<div class="presente" style="margin-top: 0;">
				<ul class="preview-list row">
					<li class="col-md-4 preview-item-container text-center">
						@if ($gifts['brinquedos'])
							<a href="{{ route('convidado.brinquedos.index', $party->codigo) }}"><img src="{{ asset('assets/site/images/bg-presente.png') }}" alt="" class="bg" /></a>
						@else
							<img src="{{ asset('assets/site/images/bg-presente.png') }}" alt="" class="bg" />
						@endif
						<div class="preview-item-toys"></div>
						@if ($gifts['brinquedos'])
							<a href="{{ route('convidado.brinquedos.index', $party->codigo) }}" class="preview-item-text text-center">BRINQUEDOS</a>
						@else
							<span class="preview-item-text text-center">BRINQUEDOS</span>
						@endif
						<p class="text-center desc">
							@if ($gifts['brinquedos'])
								<a href="{{ route('convidado.brinquedos.index', $party->codigo) }}">
							@endif
								Clique aqui para ver a lista completa dos brinquedos prediletos escolhidos pelo aniversariante!
							@if ($gifts['brinquedos'])
								</a>
							@endif
						</p>
						<div class="porcentagem">
							<p class="porcentagem-container"><span style="width:{{ $percent['toys'] }}%"></span></p>
							<strong>{{ $percent['toys'] }}% disponivel</strong>
						</div>
					</li>
					<li class="col-md-4 text-center preview-item-container">
						@if ($gifts['roupas'])
							<a href="{{ route('convidado.roupas.index', $party->codigo) }}" class="preview-item-clothes"></a>
							<a href="{{ route('convidado.roupas.index', $party->codigo) }}" class="preview-item-text text-center">ROUPAS</a>
						@else
							<span class="preview-item-clothes"></span>
							<span class="preview-item-text text-center">ROUPAS</span>
						@endif
						<p class="text-center desc">
							@if ($gifts['roupas'])
								<a href="{{ route('convidado.roupas.index', $party->codigo) }}">
							@endif
								Clique aqui para ver a lista de roupas que o aniversariante quer ganhar!<br>&nbsp;
							@if ($gifts['roupas'])
								</a>
							@endif
						</p>
						<div class="porcentagem">
							<p class="porcentagem-container"><span style="width:{{ $percent['clothes'] }}%"></span></p>
							<strong>{{ $percent['clothes'] }}% disponivel</strong>
						</div>
					</li>
					<li class="col-md-4 text-center preview-item-container ">
						@if ($gifts['cotas'])
							<a href="{{ route('convidado.cotas.index', $party->codigo) }}" class="preview-item-quota"></a>
							<a href="{{ route('convidado.cotas.index', $party->codigo) }}" class="preview-item-text text-center">COTAS</a>
						@else
							<span class="preview-item-quota"></span>
							<span class="preview-item-text text-center">COTAS</span>
						@endif
						<p class="text-center desc">
							@if ($gifts['cotas'])
								<a href="{{ route('convidado.cotas.index', $party->codigo) }}">
							@endif
								Clique aqui para presentear com parte da cota e ajudar naquele presentão!<br>&nbsp;
							@if ($gifts['cotas'])
								</a>
							@endif
						</p>
						<div class="porcentagem">
							<p class="porcentagem-container"><span style="width:{{ $percent['quotas'] }}%"></span></p>
							<strong>{{ $percent['quotas'] }}% disponivel</strong>
						</div>
					</li>
				</ul>
			</div>
			<br clear="all" />
		</div>
		<div class="preview-section section-recado">
			<div class="preview-header-space"></div>
			<div class="mensagem">
				<form class="boxfL rsvp-form" action="{{ route('convidado.escrever-mensagem', $party->codigo) }}" method="post">
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
		</div>
		<div class="preview-section section-mapa">
			<div class="preview-header-space"></div>
			<div class="maps">
				<div class="container clearfix">
					<div class="location">
						<div class="where">
							<h3>Onde?</h3>
							<p>{{ $party->endereco }}</p>
							@if (!empty($party->referencia))
								<p>Próximo a {{ $party->referencia }}</p>
							@endif
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
			<br clear="all" />
		</div>
	</div>
	{{--  </div>  --}}
@endsection
@section('scripts')
@endsection