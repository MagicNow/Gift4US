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
                        <a href="#">Editar informações do cadastro</a>            
                        <a href="#">Mudar senha</a>            
                        <a href="#">Atualizar dados Bancários</a>            
                    </label>
                    <label>
                        <a href="#" class="active">Resgatar valores</a>
                        <span>R$ 0,00</span>
                    </label>
                </div>
                <form>
                    <fieldset class="resgatar col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <span>
                            Aqui você pode resgatar o valor referente aos presentes que o aniversariante ganhou que se enquadram nas opções cotas e roupas. É super fácil! 

Confira os dados da sua conta bancária escolhida para a transação, preeencha o campo com o valor que quer resgatar e clique em Solicitar Trasnferência.
                        </span>
                        <label class="clearfix">
                            Nome do Favorecido:
                            <input type="text" name="agencia" value="Marlene Albuquerque">
                        </label>
                        <label>
                            Banco:
                            <input type="text" name="banco" value="Banco Itaú ">
                        </label>
                        <label>
                            Nº da agência:
                            <input type="text" name="agencia" value="999999-9">
                        </label>
                        <label>
                            Conta:
                            <input type="text" name="conta" value="999999-9">
                        </label>
                        <label>
                            CPF:
                            <input type="text" name="cpf" value="999999999-99">
                        </label>
                        <label class="radio col-md-6 col-lg-6">
                            
                            Escolher esta conta para a transferência
                            <input type="radio" name="tipo_conta">
                        </label>
                        <p>Valor a ser transferido</p>
                        <label>
                            Valor para transferência:
                            <input type="text" name="conta" value="R$ preeencha aqui">
                        </label>
                        <label>
                            Valor disponível:
                            <input type="text" name="cpf" value="R$ 7.879,90">
                        </label>
                        <button type="submit" class="enviar"> Solicitar Transferência</button>
                        <span class="clearfix">Sua solicitação de transferência foi solicitada com sucesso! Você recebera um email com as demais intruções</span>

                    </fieldset>
                    
                </form>
                
        </div>
    </div>
@endsection
