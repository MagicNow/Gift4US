<div class="detalhes-festa">
	<p>{{ $party->nome }}</p>
	<div class="row">
		<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
	</div>
	<div class="row"> 
		<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Editar</p>
		</a>
		<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected">Excluir</p>
		</a>
	</div>
</div>
<div class="detalhes-festa lista-presentes">
	<p>Lista de presentes</p>
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
		<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
		<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected">Editar</p>
		</a>
	</div>
</div>
<div class="detalhes-festa lista-presentes">
	<p>Presenças confirmadas</p>
	<div class="row pD">
		<span class="pull-left">{{ $party->confirmacaoPresenca->count() }} pessoas confirmadas</span>
		<small class="pull-left">
			<img src="{{ asset('assets/site/images/img-presente-in.png') }}" />
			<span>43</span>
		</small>
	</div>
	<div class="row"> 
		<a href="{{ route('notificacoes.aniversario', [ $party->id, 'modal' => 'lista-de-aniversarios' ]) }}" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
		<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected">Editar</p>
		</a>
	</div>
</div>
<div class="detalhes-festa lista-presentes">
	<p>Recados recebidos</p>
	<div class="row">
		<span>{{ $party->mensagem->count() }} recados</span>
	</div>
	<div class="row"> 
		<a href="#" class="gifts-box-number-middle toys dados-container col-md-6">
			<p class="gifts-box-number-middle-selected">Ver lista</p>
		</a>
		<a href="#" class="gifts-box-number-middle toys col-md-6 dados-container">
			<p class="gifts-box-number-middle-selected">Download</p>
		</a>
	</div>
	<div class="gifts-box-number-footer">
		<a href="{{ route('convidado.index', $party->id) }}" target="_blank" class="gifts-box-number-submit">ver página do aniversariante</a>
	</div>
</div>