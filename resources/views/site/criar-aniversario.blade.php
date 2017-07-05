@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_criando.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

				<div class="dados col-md-offset-2 col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<form action="" method="post" class="dados-container">
						<fieldset class="financeiro">
							<div class="form-group">
								<label for="aniver-nome">Qual nome do aniversáriante?</label>
								<input type="text" class="form-control form-input" id="aniver-nome" name="nome">
							</div>
							
							<div class="form-group">
								<label for="aniver-anos">Quantos anos irá fazer?</label>
								<div class="form-inline">
									<input type="number" name="anos" class="form-control form-input" id="aniver-anos">
									<label class="control-label">anos</label>
									<input type="number" name="meses" class="form-control form-input">
									<label class="control-label">meses</label>
								</div>
							</div>
							<div class="form-group">
								<label for="aniver-data">Qual a data da festa?</label>
								<div class="form-inline">
									<input type="number" name="dia" class="form-control form-input" id="aniver-data">
									<label class="control-label">/</label>
									<input type="number" name="mes" class="form-control form-input">
									<label class="control-label">/</label>
									<input type="number" name="ano" class="form-control form-input">
								</div>
							</label>
							<label class="form-group">
								<label for="aniver-horario">Qual horário da festa?</label>
								<div class="form-inline">
									<input type="number" name="hora" class="form-control form-input" id="aniver-horario">
									<span class="control-label">:</span>
									<input type="number" name="minuto" class="form-control form-input">
								</div>
							</label>
						</fieldset>
					</form>
				</div>
				<form>
					<fieldset class="financeiro col-xs-12 col-sm-12 col-md-5 col-lg-5">
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
					<button type="submit" class="enviar"> Concluir</button>
				</form>
				
		</div>
	</div>
@endsection
