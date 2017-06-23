@extends('site/master')

@section('content')
    <div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho_editar.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-5')) }}   
    			<div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-5 col-lg-5">
    				<label>
    					<span>Marlene Albuquerque</span>
                        <span>marlene@albuquerque.com.br</span>    					
    				</label>
    				<label>
                        <a href="#" class="active">Editar informações do cadastro</a>            
                        <a href="#">Mudar senha</a>            
                        <a href="#" >Atualizar dados Bancários</a>            
                    </label>
                    <label>
                        <a href="#">Resgatar valores</a>
                        <span>R$ 0,00</span>
                    </label>
    			</div>
                <form>
                    <fieldset class=" col-xs-12 col-sm-12 col-md-5 col-lg-5">
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
                    <button type="submit" class="enviar"> Concluir</button>
                    <p><span>Você receberá um email de confirmação</span></p>
                </fieldset>
                    
                </form>
    			
    	</div>
    </div>
@endsection
