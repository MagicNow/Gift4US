<form action="{{ route('dados-bancarios.update', $conta->id) }}" method="post" class="usuario-form" data-presente="{{ asset('assets/site/images/presentinho_senha.png') }}">
	<input type="hidden" name="_method" value="put" />
	<fieldset class="financeiro col-md-12">
		<span class="usuario-form-header-text">
			[OPCIONAL]
			Seus dados bancários são necessários para que você possa receber valores referentes as cotas de presentes. A Gift4Us não irá compartilhar esses dados com ninguém e seus dados estarão em mais completa segurança.
		</span>
		<div class="form-group">
			<label for="banco-nome">Banco:</label>
			{{ Form::select('bancos_id', $bancos, $conta->bancos_id, ['class' => 'form-control form-input', 'id' => 'banco-nome']) }}
		</div>
		<div class="form-group">
			<label for="banco-agencia">Nº da agência:</label>
			<input type="text" id="banco-agencia" name="agencia" class="form-control form-input" value="{{ $conta->agencia }}">
		</div>
		<div class="form-group row">
			<label class="col-md-6">
				<input type="radio" name="tipo_conta" value="corrente" {{ $conta->tipo_conta == 'CORRENTE' ? 'checked' : '' }}> conta corrente
			</label>
			<label class="col-md-6">
				<input type="radio" name="tipo_conta" value="poupanca" {{ $conta->tipo_conta == 'POUPANCA' ? 'checked' : '' }}> conta poupança
			</label>
		</div>
		<div class="form-group">
			<label for="banco-conta">Nº da conta:</label>
			<input type="text" id="banco-conta" name="conta" class="form-control form-input" value="{{ $conta->conta }}">
		</div>
		<div class="form-group">
			<label for="banco-cpf">CPF:</label>
			<input type="text" id="banco-cpf" name="cpf" class="form-control form-input" value="{{ $conta->cpf }}">
		</div>
		<p class="usuario-form-header-text">Fique tranquilo! Você poderá atualizar os dados da sua conta a qualquer momento aqui no portal.<br><br></p>
	</fieldset>
	<button type="submit" class="enviar usuario-form-enviar"> Concluir</button>
</form>