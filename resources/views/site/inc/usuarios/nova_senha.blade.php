<form class="usuario-form" data-presente="{{ asset('assets/site/images/presentinho_senha.png') }}">
	<fieldset class="nova_senha col-md-12">
		<span class="usuario-form-header-text">
			Fique tranquilo! Você receberá uma senha próvisória no email cadastrado abaixo.
		</span>
		<p>{{ $client->email }}</p>
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
			<input type="password" class="form-control form-input" id="senha-nova-repete" name="confirm_senha">
		</div>
		<button type="submit" class="enviar usuario-form-enviar"> Concluir</button>
	</fieldset>
</form>