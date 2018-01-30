@extends('convidado/master')

@section('content')

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent05.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-roupas', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'roupas'])
					</div>
					<div class="form-cadastro">
						<div class="form-cadastro-content">
							<form method="post" action="{{ route('convidado.roupas.compraOnline', [$party->slug, $product->id]) }}">
								<fieldset class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-pgto-fieldset">
									<label>
										Nome:
										<input type="text" name="nome" required="" value="" aria-required="true">
									</label>
									<label>
										Email:
										<input type="email" name="email" required="" value="" aria-required="true">
									</label>
									<label>
										CPF:
										<input type="text" name="cpf" value="" class="input-cpf" value="" aria-required="true">
									</label>
									<div class="row">
										<div class="col-md-6">
											<label>
												Telefone:
												<input type="text" name="tel" value="" class="input-phone" value="" aria-required="true">
											</label>
										</div>
										<div class="col-md-6">
											<label>
												Data de Nascimento:
												<input type="text" name="nascimento" value="" class="input-data" value="" aria-required="true">
											</label>
										</div>
									</div>
									<button type="submit" class="enviar"> Finalizar</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
