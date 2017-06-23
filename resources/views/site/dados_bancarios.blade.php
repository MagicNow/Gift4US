@extends('site/master')

@section('content')
    <div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho_dados_bancarios.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}   
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
                <form>
                    <fieldset class="financeiro col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <span>
                            [OPCIONAL]
                            Seus dados bancários são necessários para que você possa receber valores referentes as cotas de presentes. A Gift4Us não irá compartilhar esses dados com ninguém e seus dados estarão em mais completa segurança.
                        </span>
                        <label>
                            Banco:
                            <select name="banco">
                                <option>341 - Banco Itaú S/A</option>
                            </select>
                        </label>
                        <label>
                            Nº da agência:
                            <input type="email" name="agencia">
                        </label>
                        <label class="radio col-md-6 col-lg-6">
                            conta corrente
                            <input type="radio" name="tipo_conta">
                        </label>
                        <label class="radio col-md-6 col-lg-6">
                            conta poupança
                            <input type="radio" name="tipo_conta">
                        </label>
                        <label>
                            Nº da conta:
                            <input type="text" name="conta">
                        </label>
                        <label>
                            CPF:
                            <input type="text" name="cpf">
                        </label>
                        <span>Fique tranquilo! Você poderá atualizar os dados da sua conta a qualquer momento aqui no portal.</span>
                    </fieldset>
                    <button type="submit" class="enviar"> Concluir</button>
                </form>
    			
    	</div>
    </div>
@endsection
