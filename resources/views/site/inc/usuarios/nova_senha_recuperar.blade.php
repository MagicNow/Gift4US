<form action="{{ route('usuario.nova-senha.recuperar.update') }}" method="post" class="usuario-form password-form" data-presente="{{ asset('assets/site/images/presentinho_senha.png') }}">
	<fieldset class="nova-senha-recuperar col-md-12">
		<span class="usuario-form-header-text text-center">Fique tranquilo! Você receberá uma senha próvisória no email cadastrado abaixo.</span>
		<p class="nova-senha-email text-center">{{ $client->email }}</p>

		@if (session('errors'))
			<div class="alert alert-danger">
				{!! session('errors')->first() !!}
			</div>
		@endif

		<div class="form-group">
			<label for="senha-provisoria">Senha provisória:</label>
			<input type="password" class="form-control form-input" id="senha-provisoria" name="provisoria" placeholder="Coloque aqui a senha que recebeu por email">
		</div>
		<div class="form-group">
			<label for="senha-nova">Insira sua nova senha:</label>
			<input type="password" class="form-control form-input" id="senha-nova" name="senha" placeholder="A senha precisa conter no mínimo 6 dígitos">
		</div>
		<div class="form-group">
			<label for="senha-nova-repete">Insira novamente sua nova senha:</label>
			<input type="password" class="form-control form-input" id="senha-nova-repete" name="confirma_senha">
		</div>
		<button type="submit" class="enviar usuario-form-enviar"> Concluir</button>
	</fieldset>
</form>