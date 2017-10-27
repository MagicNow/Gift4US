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

	 {!! Html::style('assets/site/styles/styles.css') !!}
	 {!! Html::style('assets/site/styles/convidado.css') !!}
</head>
<body class="{!! Route::currentRouteName() !!} {{ $party ? $party->layout()->first()->class : NULL }}">
		<!--HEADER-->
		<header>
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
							<li class="divisor"><a href="#" alt=""><i class="fa fa-search" aria-hidden="true"></i> procurar aniversário</a></li>
							<li class="divisor"><a href="#" alt="">como funciona</a></li>
							<li class="divisor"><a href="#" alt="">passo a passo</a></li>
              <li><a href="#" alt="">novo usuário</a></li>
							<li class="login-do"><a href="#" alt=""><img src="{{ url('assets/site/images/small_logo.png') }}" class="header-logo">fazer login</a></li>
						</ul>
					</nav>
				</div>
				<h2 class="title">{{ isset($titulo) ? $titulo : 'ÁREA DO CONVIDADO' }}</h2>
			</div>

		</header>
		<!--END HEADER-->


