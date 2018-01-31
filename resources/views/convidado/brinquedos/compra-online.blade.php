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
				@include('convidado.inc.filtro-brinquedos', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title">Quero comprar online agora</p>
								<div class="col-md-4">
									@if (!empty($product->imagem))
										<img src="{{ $product->imagem }}" class="gifts-item-image" width="100%">
									@endif
								</div>
								<div class="gifts-item-content col-md-8">
									<h5 class="gifts-item-title bgC">{{ $product->titulo }}</h5>
									<p class="gifts-item-price-description">Preço aproximado:</p>
									<p class="gifts-item-price-value bgC">R$ {{ $product->preco_venda }}</p>
									<p class="gifts-item-price-description">Observação</p>
									<p class="gifts-item-price-value bgC">{{ $product->descricao }}</p>
									<p class="gifts-item-price-description">Lojas disponiveis</p>
									<p class="linkLojaOnline">PBKids</p>
									<p class="linkLojaOnline">Americanas</p>
									<p class="linkLojaOnline">Submarino</p>
									<p class="linkLojaOnline" style="margin-right:0;">B-Mart</p>
									<p class="linkLojaOnline">Hi-Happy</p>
									<h5 class="col-md-12 gifts-item-title">Atenção</h5>
									<p class="col-md-12 gifts-item-price-description">Antes de sair, que tal avisar o aniversariante que irá dar este presente?<br />Preencha os campos abaixo para concluir!</p>
									<form action="{{ route('presentes.reservar') }}" method="post" class="col-md-12 formOnline send-form-ajax">
										<input type="hidden" name="festas_id" value="{{ $party->id }}">
										<input type="hidden" name="produtos_id" value="{{ $product->id }}">
										<div class="form-group">
											<input type="text" name="nome" id="msg-nome" class="form-control form-input bgC" placeholder="nome" maxlenght="100" required>
										</div>
										<div class="form-group">
											<input type="email" name="email" id="msg-nome" class="form-control form-input bgC" placeholder="E-mail" maxlenght="255" required>
										</div>
										<div class="form-group">
											<input type="text" name="rg" id="msg-nome" class="form-control form-input bgC" placeholder="RG" pattern="\d*" maxlength="10" required>
										</div>
										<div class="form-group">
											<textarea name="mensagem" id="msg-mensagem" class="form-control form-input bgC" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
										</div>
										<p class="gifts-item-price-value">Atenção1: A partir do momento que você decidir dar este presente, ele será <cite>removido definitivamente da lista</cite> e não poderá mais ser escolhido por nenhum outro convidado da festa</p>
										<div class="row">
											<div class="col-md-8">&nbsp;</div>
											<div class="col-md-4 text-right">
												<input type="submit" class="my-birthday-create-button-small" value="Enviar">
											</div>
										</div>
									</form>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
