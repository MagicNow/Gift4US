<form class="usuario-form" data-presente="{{ asset('assets/site/images/presentinho_resgatar.png') }}">
	<fieldset class="resgatar col-md-12">
		<span class="usuario-form-header-text">
			Aqui você pode resgatar o valor referente aos presentes que o aniversariante ganhou que se enquadram nas opções cotas e roupas. É super fácil! 

			Confira os dados da sua conta bancária escolhida para a transação, preeencha o campo com o valor que quer resgatar e clique em Solicitar Trasnferência.
		</span>
		<div class="form-group">
			<label for="resgate-favorecido">Nome do Favorecido:</label>
			<input type="text" class="form-control form-input" id="resgate-favorecido" name="nome" value="{{ $client->nome }}" disabled>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="resgate-banco">Banco:</label>
				<input type="text" class="form-control form-input" id="resgate-banco" name="banco" value="{{ $client->conta->banco->nome }}" disabled>
			</div>
			<div class="form-group col-md-4">
				<label for="resgate-agencia">Nº da agência:</label>
				<input type="text" class="form-control form-input" id="resgate-agencia" name="agencia" value="{{ $client->conta->agencia }}" disabled>
			</div>
			<div class="form-group col-md-4">
				<label for="resgate-conta">Nº da Conta:</label>
				<input type="text" class="form-control form-input" id="resgate-conta" name="conta" value="{{ $client->conta->conta }}" disabled>
			</div>
		</div>
		<div class="form-group">
			<label for="resgate-cpf">CPF:</label>
			<input type="text" class="form-control form-input" id="resgate-cpf" name="cpf" value="{{ $client->conta->cpf }}" disabled>
		</div>

		<div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" value="escolher_conta"> Escolher esta conta para a transferência
			</label>
		</div>

		<p class="resgate-valor">Valor a ser transferido</p>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="resgate-valor">Valor para transferência:</label>
				<input type="text" class="form-control form-input" id="resgate-valor" name="conta" placeholder="R$ preeencha aqui">
			</div>
			<label class="col-md-6">
				<label for="resgate-disponivel">Valor disponível:</label>
				<input type="text" id="resgate-disponivel" class="form-control form-input" name="valor_disponivel" value="R$ 7.879,90" disabled>
			</label>
		</div>
		<button type="submit" class="enviar usuario-form-enviar"> Solicitar Transferência</button>
		<span class="clearfix usuario-form-header-text">Sua solicitação de transferência foi solicitada com sucesso! Você recebera um email com as demais intruções<br><br></span>
	</fieldset>
</form>