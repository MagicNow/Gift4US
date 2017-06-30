<form action="{{ route('cadastro.update', $client->id) }}" method="post" class="usuario-form" data-presente="{{ asset('assets/site/images/presentinho_senha.png') }}">
	<input type="hidden" name="_method" value="put" />
	<fieldset class="editar-dados col-md-12">
		<div class="form-group">
			<label for="dados-nome">Nome:</label>
			<input type="text" name="nome" id="dados-nome" class="form-control form-input" value="{{ $client->nome }}">
		</div>
		<div class="form-group">
			<label for="dados-email">Email:</label>
			<input type="email" name="email" id="dados-email" class="form-control form-input" value="{{ $client->email }}">
		</div>
		<div class="form-group">
			<label for="dados-telefone">Telefone:</label>
			<input type="tel" name="tel" id="dados-telefone" class="form-control form-input" value="({{ $client->telefone_ddd }}) {{ $client->telefone_numero }}">
		</div>
		<button type="submit" class="enviar usuario-form-enviar"> Concluir</button>
		<p class="text-center usuario-form-header-text">Você receberá um email de confirmação</p>
	</fieldset>
</form>