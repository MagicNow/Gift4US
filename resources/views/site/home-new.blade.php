<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('assets/home/images/home-favicon.ico?crc=4131456498') }}"/>
	<title>GIFT4US | 1º site de lista de presentes para crianças</title>
	<meta name="csrf-token" content="{!! csrf_token() !!}">
	<meta http-equiv="content-language" content="pt-br" />

	{!! Html::style('assets/site/styles/styles.css') !!}
	{!! Html::style('assets/site/styles/home.css') !!}
</head>
<body>
	<header class="container">
		<h1 class="hidden">Menu da página</h1>
		<img class="svg" src="http://magic.gift4us/assets/home/images/svg-colado-123x125.svg?crc=97497752" width="35" height="36" alt="">
		<nav class="home-nav">
			<ul class="home-nav-list">
				<li class="home-nav-item"><a href="#lista_de_presentes">lista de presentes</a></li>
				<li class="home-nav-item"><a href="#como_funciona">como funciona</a></li>
				<li class="home-nav-item"><a href="#passoapasso">passo a passo</a></li>
			</ul>
			<form class="home-nav-search" method="post" action="{{ route('convidado.login') }}">
				<input type="search" name="name">
			</form>
			<a href="{{ route('cadastro.create') }}" target="_self" class="home-nav-item">novo usuário</a>
			<a href="#convidado_aniversariante" target="_self" class="home-nav-item">login</a>
		</nav>
	</header>
	<section class="home-welcome container">
		<img src="{{ url('assets/home-new/images/home.png') }}" width="100%">
	</section>
</body>
</html>