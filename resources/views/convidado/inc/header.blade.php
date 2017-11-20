<!doctype html>
<html class="no-js" lang="pt-BR" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GIFT4US</title>
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{!! csrf_token() !!}">
	<meta http-equiv="content-language" content="pt-br" />

	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:title" content="Gift4US">
	<meta property="og:site_name" content="Gift4US">
	<meta property="og:description" content="Acesse a página do meu aniversário :)">
	<meta property="og:image" content="{{ url('storage/birthdays/' . $party->foto) }}">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:type" content="website">

	{!! Html::style('assets/site/styles/styles.css') !!}
	{!! Html::style('assets/site/styles/convidado.css') !!}
</head>
<body class="{!! Route::currentRouteName() !!} {{ $party && $party->layout()->count() > 0 ? $party->layout()->first()->class : NULL }}">
		<!--HEADER-->
		<header class="area-convidado">
			<div class="navbar navbar-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="container">
					<div class="navbar-header ">
						<div type="" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
					</div>
					<nav id="navbar" role="navigation" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="divisor"><a href="{{ route('home') . '#convidado_aniversariante' }}" alt=""><i class="fa fa-search" aria-hidden="true"></i> procurar aniversário</a></li>
							<li class="divisor"><a href="{{ route('home') . '#como_funciona' }}" alt="">como funciona</a></li>
							<li class="divisor"><a href="{{ route('home') . '#passoapasso' }}" alt="">passo a passo</a></li>
              				<li><a href="{{ route('cadastro.create') }}" alt="">novo usuário</a></li>
							<li class="login-do"><a href="{{ route('home') . '#convidado_aniversariante' }}" alt=""><img src="{{ url('assets/site/images/small_logo.png') }}" class="header-logo"><br/>fazer login</a></li>
						</ul>
					</nav>
				</div>
				<h2 class="title">{{ isset($titulo) ? $titulo : 'ÁREA DO CONVIDADO' }}</h2>
			</div>

		</header>
		<!--END HEADER-->


