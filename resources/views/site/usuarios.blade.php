@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12" role="main">
		<div class="container">
			<div class="presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5"></div>
			<div class="flex-row row">
				<div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="dados-container">
						<p class="usuario-menu-texto usuario-nome">{{ $client->nome }}</p>
						<p class="usuario-menu-texto">{{ $client->email }}</p>
						<div class="usuario-menu-dados">
							<a href="{{ route('cadastro.edit', $client->id) }}" class="{{ Route::currentRouteName() == 'usuario.editar-dados' ? 'active': '' }} usuario-menu"><span class="usuario-menu-texto">Editar informações do cadastro</span></a>            
							<a href="{{ URL::to('usuario/nova-senha') }}" class="{{ Route::currentRouteName() == 'usuario.nova-senha' ? 'active': '' }} usuario-menu"><span class="usuario-menu-texto">Mudar senha</span></a>

							<a href="{{ isset($client->conta) ? route('dados-bancarios.edit', $client->conta->id) : route('dados-bancarios.create') }}" class="{{ Route::currentRouteName() == 'usuario.dados-bancarios' ? 'active': '' }} usuario-menu"><span class="usuario-menu-texto">Atualizar dados Bancários</span></a>
							@if (!isset($client->conta))
								<p class="usuario-menu-texto-cinza">Nenhuma conta cadastrada neste perfil</p>
							@endif
						</div>
						<a href="{{ URL::route('transferencia.index') }}" class="{{ Route::currentRouteName() == 'usuario.transferencia' ? 'active': '' }} usuario-menu"><span class="usuario-menu-texto">Resgatar valores</span></a>
						<span class="usuario-menu-texto-cinza">R$ 0,00</span>
						<p class="usuario-menu-texto-cinza">Você não tem nenhum valor para ser resgatado</p>
					</div>
				</div>

				<div class="usuario-ajax col-xs-12 col-sm-12 col-md-5">
					<div class="col-sm-12 col-md-12 usuario-ajax-content">
						@if (isset($view))
							@include($view)
						@else
							@include('site/inc/usuarios/meus_aniversarios')
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
