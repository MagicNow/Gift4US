@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12" role="main">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_dados_bancarios.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}
			<div class="flex-row row">
				<div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="dados-container">
						<label>
							<span>Marlene Albuquerque</span>
							<span>marlene@albuquerque.com.br</span>                     
						</label>
						<label>
							<a href="{{ URL::to('usuario/editar-dados') }}" class="{{ Route::currentRouteName() == 'usuario.editar-dados' ? 'active': '' }} usuario-menu">Editar informações do cadastro</a>            
							<a href="{{ URL::to('usuario/nova-senha') }}" class="{{ Route::currentRouteName() == 'usuario.nova-senha' ? 'active': '' }} usuario-menu">Mudar senha</a>            
							<a href="{{ URL::to('usuario/dados-bancarios') }}" class="{{ Route::currentRouteName() == 'usuario.dados-bancarios' ? 'active': '' }} usuario-menu">Atualizar dados Bancários</a>            
						</label>
						<label>
							<a href="{{ URL::to('usuario/transferencia') }}" class="{{ Route::currentRouteName() == 'usuario.transferencia' ? 'active': '' }} usuario-menu">Resgatar valores</a>
							<span>R$ 0,00</span>
						</label>
					</div>
				</div>

				<div class="usuario-ajax col-xs-12 col-sm-12 col-md-6 col-lg-6">
					@if (isset($view))
						@include($view)
					@else
						@include('site/inc/usuarios/home')
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
