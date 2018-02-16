<div class="detalhes-festa">
	<div class="clearfix my-birthday-item-input">
		<input type="checkbox" name="active[{{ $party->id }}]" id="my-birthday-{{ $party->id }}" class="my-birthday-checkbox" value="1" {{ $party->ativo ? 'checked' : NULL }} data-festa-id="{{ $party->id }}" />
	</div>

	<p>{{ $party->nome }}</p>
	<div class="row">
		<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
	</div>
	<div class="row"> 
		<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 1 ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Editar</p>
		</a>
		<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected birthday-remove" data-festa-id="{{ $party->id }}">Excluir</p>
		</a>
	</div>
</div>
<div class="detalhes-festa lista-presentes">
	{{--  <p>Lista de presentes</p>
	<div class="row pD">
		<span class="pull-left">103 / 44 brinquedos</span>
		<small class="pull-left">
			<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
			<span>33</span>
		</small>
	</div>
	<div class="row pD">
		<span class="pull-left">103 / 44 roupas</span>
		<small class="pull-left">
			<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
			<span>33</span>
		</small>
	</div>
	<div class="row pD">
		<span class="pull-left">103 / 44 cotas</span>
	</div>
	<div class="row"> 
		<a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $party->id, 5 ]) }}" class="gifts-box-number-middle dados-container col-md-12">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
	</div>  --}}
</div>
<div class="detalhes-festa lista-presentes">
	<p>Presenças confirmadas</p>
	<div class="row pD">
		<span class="pull-left">{{ $party->confirmacaoPresenca->sum('numero_pessoas') }} pessoas confirmadas</span>
		<small class="pull-left">
			<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
			<span>{{ $party->confirmacaoPresenca()->where('visualizado', 0)->count() }}</span>
		</small>
	</div>
	<div class="row"> 
		<a href="{{ route('notificacoes.aniversario', [ $party->id, 'modal' => 'lista-de-aniversarios' ]) }}" class="gifts-box-number-middle dados-container col-md-12">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
	</div>
</div>
<div class="detalhes-festa lista-presentes">
	<p>Recados recebidos</p>
	<div class="row">
		<span>{{ $party->mensagem->count() }} recados</span>
	</div>
	<div class="row"> 
		<a href="{{ route('notificacoes.aniversario', [ $party->id, 'modal' => 'lista-de-recados' ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
		<a href="{{ route('notificacoes.exportar.recados', $party->id) }}" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected">Download</p>
		</a>
	</div>
	<div class="gifts-box-number-footer">
		<a href="{{ route('convidado.index', $party->codigo) }}" target="_blank" class="gifts-box-number-submit">ver página do aniversariante</a>
	</div>
</div>