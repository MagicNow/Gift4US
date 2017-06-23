@extends('site/master')

@section('content')
    <div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            {{ Html::image('assets/site/images/presentinho_logado.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}   
                <div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <label>
                        <span>Marlene Albuquerque</span>
                        <span>marlene@albuquerque.com.br</span>                     
                    </label>
                    <label>
                        <a href="#">Editar informações do cadastro</a>            
                        <a href="#">Mudar senha</a>            
                        <a href="#">Atualizar dados Bancários</a>            
                    </label>
                    <label>
                        <a href="#">Resgatar valores</a>
                        <span>R$ 0,00</span>
                    </label>
                </div>
                <div class="aniversario col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <p><span>Você ainda não tem nenhum aniversário criado.</span></p>
                    <p class="criar">Crie um agora mesmo!</p>
                    <a href="">{{ Html::image('assets/site/images/add.png', '', array('class' => '')) }} </a>
                    <p><span>Usando o Gift4Us você terá acesso a uma série de ferramentas para organizar sua festa, convidar todos os seus conhecidos e deixar a disposição deles as listas de presentes. Tá esperando o quê para criar sua festa?</span></p>
                </div>
        </div>
    </div>
@endsection
