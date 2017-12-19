@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent07.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-roupas', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'roupas'])
					</div>
					<div class="mensagem-interna">
						<form>
							<fieldset class="col-md-12">
								<strong class="my-birthday-create-button-small">Eba</strong>
								<p class="text-left">Com certeza vou adorar o presente! Você receberá um e-mail com os detalhes da festa! Não esqueça de deixar uma mensagem!</p>
								<div class="form-group">
									<input type="text" name="nome" id="msg-nome" class="form-control form-input" placeholder="nome">
								</div>
								<div class="form-group">
									<textarea name="mensagem" id="msg-mensagem" class="form-control form-input" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
								</div>
								<button type="submit" class="enviar msg-form-enviar"> Enviar</button>
							</fieldset>
						</form>
						<img src="{{ asset('assets/site/images/presentinho-blue-02.png') }}" class="presentinho-azul" alt="">
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection

@section('scripts')

@endsection
