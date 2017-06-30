<form action="{{ route('nova-senha.update', $client->id) }}" method="post" class="usuario-form password-form" data-presente="{{ asset('assets/site/images/presentinho_senha.png') }}">
	<input type="hidden" name="_method" value="put" />

	<fieldset class="nova_senha col-md-12">
		@if (session('errors'))
			<div class="alert alert-danger">
				{!! session('errors')->first() !!}
			</div>
		@endif

		<div class="form-group">
			<label for="senha-atual">Senha atual:</label>
			<input type="password" class="form-control form-input" id="senha-atual" name="provisoria" required>

			<p class="text-center usuario-form-header-text">esqueceu sua senha? <a href="{{ route('usuario.nova-senha.recuperar') }}">Clique aqui!</a></p>
		</div>
		<div class="form-group">
			<label for="senha-nova">Insira sua nova senha:</label>
			<input type="password" class="form-control form-input" id="senha-nova" name="senha" placeholder="A senha precisa conter no mínimo 6 dígitos" required>
		</div>
		<div class="form-group">
			<label for="senha-nova-repete">Insira novamente sua nova senha:</label>
			<input type="password" class="form-control form-input" id="senha-nova-repete" name="confirma_senha" required>
		</div>
		<button type="submit" class="enviar usuario-form-enviar"> Concluir</button>
	</fieldset>
</form>