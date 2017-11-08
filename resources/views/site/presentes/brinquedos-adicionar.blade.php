@extends('site/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criar-presentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent12.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.filtro-brinquedos')

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('site.inc.filtro-categorias', ['filter' => 'brinquedos'])
					</div>
					<ul class="gifts-list" data-festa-id="3">
						<li class="col-md-12 gifts-item gifts-item-detalhe" data-id="1">
							<div class="row">
								<p class="gifts-item-title add-brinquedo">Adicionar brinquedo</p>
								<p class="gifts-item-price-description-cota bg-presente-lista">
									Adicionar presente é muito fácil! Só precisará preeencher algumas informações básicas descritas abaixo e inserir uma foto do produto e pronto! Ao salvar ele estará automaticamente na sua lista de adicionados.
								</p>
								<form class="row criar-presentes-form edit-form-pencil" action="{{ route('usuario.meus-aniversarios.presentes.brinquedos.submeter', $party->id) }}" method="post" enctype="multipart/form-data">
									<div class="col-md-4 upload-image-container">
										<input type="file" name="imagem" class="upload-image" data-preview-file-type="text" required />
									</div>
									<div class="gifts-item-content col-md-8">
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome do presente" aria-describedby="gifts-name" name="titulo" maxlength="100" value="{{ old('titulo') }}">
											<span class="input-group-addon" id="gifts-name"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Observação</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui alguma observação caso haja necessidade" aria-describedby="gifts-obs" maxlength="255" name="descricao" value="{{ old('descricao') }}" required>
											<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Valor total</p>
										<div class="input-group gifts-input-icon">
											<input type="text" class="money form-control gifts-item-price-value bgC" placeholder="0,00" aria-describedby="gifts-total-price" name="preco_venda" value="{{ old('preco_venda') }}" required>
											<span class="input-group-addon" id="gifts-total-price"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
										</div>
										<p class="gifts-item-price-description">Lojas disponíveis</p>
										<div class="clone" id="lojas-disponiveis">
											@if (old('lojas'))
												@foreach(old('lojas') as $key => $loja)
													<div class="input-group gifts-input-icon clone-reference">
														<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome da loja em que o produto encontra-se disponível" aria-describedby="gifts-obs" maxlength="255" name="lojas[{{ $key }}][nome]" value="{{ $loja }}">
														<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
													</div>
												@endforeach
											@else
												<div class="input-group gifts-input-icon clone-reference">
													<input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome da loja em que o produto encontra-se disponível" aria-describedby="gifts-obs" maxlength="255" name="lojas[][nome]">
													<span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
												</div>
											@endif
										</div>
										<p class="gifts-item-price-value bgC textR"><a href="#" class="clone-button" data-target="lojas-disponiveis">+ Adicionar outra loja</a></p>
										<div class="gifts-item-buttons">
											<button type="submit" name="salvar" value="salvar" class="col-md-6 gifts-item-button gifts-item-button-show">Salvar</button>
											<button class="col-md-6 gifts-item-button gifts-item-button-select">Voltar</button>
											<button type="submit" name="salvar" value="salvar e adicionar" class="col-md-12 gifts-item-button criar-presentes-save-continue">Salvar e adicionar um novo presente</button>
										</div>
									</div>
								</form>
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
