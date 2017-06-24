@extends('site/master')

@section('content')
    <div class="form-cadastro col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-6')) }}
    		<form class="col-md-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10">
    			<fieldset class=" col-xs-12 col-sm-12 col-md-6 col-lg-6">
    				<label>
    					Nome:
    					<input type="text" name="nome">
    				</label>
    				<label>
    					Email:
    					<input type="email" name="email">
    				</label>
    				<label>
    					Telefone:
    					<input type="text" name="tel">
    				</label>
    				<label>
    					Senha:
    					<input type="password" name="senha">
    				</label>
    				<label>
    					Insira novamente a senha:
    					<input type="password" name="confirma_senha">
    				</label>
    			</fieldset>
    			<fieldset class="financeiro col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                <button type="submit" class="enviar"> Finalizar</button>
              {{ Html::image('assets/site/images/presentinho_red_end.png', '', array('class' => 'presentinho_red')) }}
    		</form>
    	</div>
    </div>
@endsection
