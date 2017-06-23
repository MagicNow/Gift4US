@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_dados_bancarios.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}   
				<div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<label>
						<span>Marlene Albuquerque</span>
						<span>marlene@albuquerque.com.br</span>                     
					</label>
					<label>
						<a href="{{ URL::to('usuario/editar-dados') }}" class="usuario-menu">Editar informações do cadastro</a>            
						<a href="{{ URL::to('usuario/nova-senha') }}" class="usuario-menu">Mudar senha</a>            
						<a href="{{ URL::to('usuario/dados-bancarios') }}" class="usuario-menu">Atualizar dados Bancários</a>            
					</label>
					<label>
						<a href="{{ URL::to('usuario/transferencia') }}" class="active usuario-menu">Resgatar valores</a>
						<span>R$ 0,00</span>
					</label>
				</div>

				<div class="usuario-ajax">
					@if (isset($view))
						@include($view)
					@else
						@include('site/inc/usuarios/home')
					@endif
				</div>
		</div>
	</div>
@endsection
