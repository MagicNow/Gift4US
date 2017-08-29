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

     {{-- {!! Html::style('assets/site/styles/bootstrap.min.css') !!} --}}
     {!! Html::style('assets/site/styles/styles.css') !!}
</head>
<body class="{{ str_replace('.', '-', Route::currentRouteName()) }}">
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
                    @if (isset($client))
                        <nav id="navbar" role="navigation" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="divisor"><a class="{!! (Route::currentRouteName() == 'home') ? 'active': ''!!}" href="{!! route('home')!!}" alt=""><i class="fa fa-search" aria-hidden="true"></i> aniversário convidado</a></li>
                                <li><a class="{!! (Route::currentRouteName() == 'cadastro.edit') ? 'active': ''!!}" href="{!! route('cadastro.edit', $client->id)!!}" alt="">dados do usuário</a></li>
                                <li><a class="{!! (Route::currentRouteName() == 'usuario.meus-aniversarios') ? 'active': ''!!}" href="{{ route('usuario.meus-aniversarios') }}" alt="">meus aniversários</a></li>
                                <li class="divisor"><a class="{!! (Route::currentRouteName() == 'fitoterapiconatural') ? 'active': ''!!}" href="{!! route('home')!!}" alt="">lista de presentes</a></li>
                                <li><a class="{!! (Route::currentRouteName() == 'transferencia.index') ? 'active': ''!!}" href="{{ route('transferencia.index') }}" alt="">resgatar valores</a></li>
                                <li class="logout"><a href="{{ route('usuario.logout') }}" alt="">{{ mb_substr($client->nome, 0, 1) }}</a></li>
                            </ul>
                        </nav>
                    @endif
                </div>
                <h2 class="navbar-title {{ isset($client) ? '' : 'no-menu' }}">{{ isset($titulo) ? $titulo : '' }}</h2>
            </div>
        </header>
        <!--END HEADER-->
       
     