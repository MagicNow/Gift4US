@extends('site/master')

@section('content')
	<div class="clearfix colelem" id="pu2427">
		<!-- group -->
		<div class="browser_width ose_ei" id="u2427-bw">
			<div class="scroll_effect" id="u2427" style="opacity: 0;">
				<!-- simple frame -->
			</div>
		</div>
		<nav class="MenuBar clearfix" id="menuu2489">
			<!-- horizontal box -->
			<div class="MenuItemContainer clearfix grpelem" id="u2504">
				<!-- vertical box -->
				<a class="nonblock nontext MenuItem MenuItemWithSubMenu anim_swing clearfix colelem" id="u2505" href="{{ url('/#lista_de_presentes') }}" data-href="anchor:U8683:U8771">
					<!-- horizontal box -->
					<div class="MenuItemLabel NoWrap clearfix grpelem" id="u2507-4">
						<!-- content -->
						<p>lista de presentes</p>
					</div>
				</a>
			</div>
			<div class="MenuItemContainer clearfix grpelem" id="u2511">
				<!-- vertical box -->
				<a class="nonblock nontext MenuItem MenuItemWithSubMenu anim_swing clearfix colelem" id="u2514" href="{{ url('/#como_funciona') }}" data-href="anchor:U8683:U8730">
					<!-- horizontal box -->
					<div class="MenuItemLabel NoWrap clearfix grpelem" id="u2517-4">
						<!-- content -->
						<p>como funciona</p>
					</div>
				</a>
			</div>
			<div class="MenuItemContainer clearfix grpelem" id="u2518">
				<!-- vertical box -->
				<a class="nonblock nontext MenuItem MenuItemWithSubMenu anim_swing clearfix colelem" id="u2519" href="{{ url('/#passoapasso') }}" data-href="anchor:U8683:U8687">
					<!-- horizontal box -->
					<div class="MenuItemLabel NoWrap clearfix grpelem" id="u2520-4">
						<!-- content -->
						<p>passo a passo</p>
					</div>
				</a>
			</div>
		</nav>
		<nav class="MenuBar clearfix scroll_effect" id="menuu3847" style="opacity: 1;">
			<!-- horizontal box -->
			<div class="MenuItemContainer clearfix grpelem" id="u3855">
				<!-- vertical box -->
				<div class="MenuItem MenuItemWithSubMenu clearfix colelem" id="u3856">
					<!-- horizontal box -->
					<div class="MenuItemLabel NoWrap clearfix grpelem" id="u3858-4">
						<!-- content -->
						<a href="{{ url('/cadastro/create') }}" target="_self">novo usuário</a>
					</div>
				</div>
			</div>
			<div class="MenuItemContainer clearfix grpelem" id="u3862">
				<!-- vertical box -->
				<div class="MenuItem MenuItemWithSubMenu clearfix colelem" id="u3865">
					<!-- horizontal box -->
					<div class="MenuItemLabel NoWrap clearfix grpelem" id="u3866-4">
						<!-- content -->
						<a href="{{ url('/#convidado_aniversariante') }}" target="_self">
							<p>login</p>
						</a>
					</div>
				</div>
			</div>
		</nav>
		<nav class="MenuBar clearfix scroll_effect" id="menuu3913" style="opacity: 1;">
			<!-- horizontal box -->
			<div class="MenuItemContainer clearfix grpelem" id="u3914">
				<!-- vertical box -->
				<div class="MenuItem MenuItemWithSubMenu clearfix colelem" id="u3915">
					<!-- horizontal box -->
					<div onclick="javascript:document.getElementById('u3964').focus();" class="MenuItemLabel NoWrap clearfix grpelem" id="u3916-4">
						<!-- content -->
						<p>aniversário</p>
						<div id="u3958">
							<!-- simple frame -->
						</div>
						<div id="u3961">
							<!-- simple frame -->
						</div>
						<div id="u3967">
							<!-- simple frame -->
						</div>
						<form method="post" action="{{ url('/convidado/login') }}">
							<input type="text" class="rounded-corners" name="name" id="u3964">
						</form>
					</div>
				</div>
			</div>
		</nav>
		<div class="clip_frame scroll_effect" id="u4816" style="opacity: 1;">
			<!-- svg -->
			<img class="svg" id="u4814" src="{{ asset('assets/home/images/svg-colado-123x125.svg?crc=97497752') }}" width="35" height="36" alt="" data-mu-svgfallback="{{ asset('assets/home/images/svg%20colado%20123x125_poster_.png?crc=4221097519') }}">
		</div>
	</div>

    <div class="form-cadastro col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-6')) }}
    		<form action="{{ route('cadastro.store') }}" method="post" class="col-md-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10 register-form">
    			<fieldset class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    @if ($errors->any())
                        <div class="notify hidden" data-type="danger">
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
