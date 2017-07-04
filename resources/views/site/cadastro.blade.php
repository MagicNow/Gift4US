@extends('site/master')

@section('content')
    <span class="hidden">{{ \Illuminate\Support\Facades\Hash::make('123456') }}</span>
    <div class="form-cadastro col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-6')) }}
    		<form action="{{ route('cadastro.store') }}" method="post" class="col-md-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10 register-form">
    			<fieldset class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

    				<label>
    					Nome:
    					<input type="text" name="nome" required value="{{ old('nome') }}">
    				</label>
    				<label>
    					Email:
    					<input type="email" name="email" required value="{{ old('email') }}">
    				</label>
    				<label>
    					Telefone:
    					<input type="tel" name="tel" value="{{ old('tel') }}">
    				</label>
    				<label>
    					Senha:
    					<input type="password" name="senha" required>
    				</label>
    				<label>
    					Insira novamente a senha:
    					<input type="password" name="confirma_senha" required>
    				</label>
    			</fieldset>
    			<fieldset class="financeiro col-xs-12 col-sm-12 col-md-6 col-lg-6">
    				<span>
    					[OPCIONAL]
    					Seus dados bancários são necessários para que você possa receber valores referentes as cotas de presentes. A Gift4Us não irá compartilhar esses dados com ninguém e seus dados estarão em mais completa segurança.
    				</span>
    				<label>
    					Banco:
                        {{ Form::select('bancos_id', $bancos, old('banco')) }}
    				</label>
    				<label>
    					Nº da agência:
    					<input type="text" name="agencia" maxlength="8" value="{{ old('agencia') }}">
    				</label>
    				<label class="radio col-md-6 col-lg-6">
    					conta corrente
    					<input type="radio" name="tipo_conta" value="corrente" {{ old('tipo_conta') == 'corrente' ? 'checked' : '' }}>
    				</label>
    				<label class="radio col-md-6 col-lg-6">
    					conta poupança
    					<input type="radio" name="tipo_conta" value="poupanca" {{ old('tipo_conta') == 'poupanca' ? 'checked' : '' }}>
    				</label>
    				<label>
    					Nº da conta:
    					<input type="text" name="conta" maxlength="14" value="{{ old('conta') }}">
    				</label>
    				<label>
    					CPF:
    					<input type="text" name="cpf" value="{{ old('cpf') }}">
    				</label>
    				<span>Fique tranquilo! Você poderá atualizar os dados da sua conta a qualquer momento aqui no portal.</span>
    			</fieldset>
                <button type="submit" class="enviar"> Finalizar</button>
              {{ Html::image('assets/site/images/presentinho_red_end.png', '', array('class' => 'presentinho_red')) }}
    		</form>
    	</div>
    </div>
@endsection
