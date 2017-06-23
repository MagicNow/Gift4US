@extends('site/master')

@section('content')
    <div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            {{ Html::image('assets/site/images/presentinho_senha.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}   
                <div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <label>
                        <span>Marlene Albuquerque</span>
                        <span>marlene@albuquerque.com.br</span>                     
                    </label>
                    <label>
                        <a href="#">Editar informações do cadastro</a>            
                        <a href="#" class="active">Mudar senha</a>            
                        <a href="#">Atualizar dados Bancários</a>            
                    </label>
                    <label>
                        <a href="#">Resgatar valores</a>
                        <span>R$ 0,00</span>
                    </label>
                </div>
                <form>
                    <fieldset class="nova_senha col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <span>
                            Fique tranquilo! Você receberá uma senha próvisória no email cadastrado abaixo.
                        </span>
                        <p>marlene@albuquerque.com.br </p>
                        <label>
                            Senha provisória:
                            <input type="text" name="provisoria" placeholder="Coloque aqui a senha que recebeu por email">
                        </label>
                        <label>
                            Insira sua nova senha:
                            <input type="text" name="senha" placeholder="A senha precisa conter no mínimo 6 dígitos">
                        </label>
                        <label>
                            Insira novamente sua nova senha::
                            <input type="text" name="cpf">
                        </label>
                        <button type="submit" class="enviar"> Concluir</button>
                    </fieldset>
                    
                </form>
                
        </div>
    </div>
@endsection
