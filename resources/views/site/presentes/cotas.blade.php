@extends('site/master')

@section('content')
	<div class="gifts-modal modal-excluir-presente hidden">
		<div class="gifts-modal-content col-md-3 col-md-offset-5">
			<h3 class="gifts-modal-title">Excluir este presente da sua lista</h3>
			<p class="gifts-modal-subtitle">Você realmente deseja excluir este presente?</p>
			<div class="gifts-modal-frame row"></div>
			<div class="gifts-modal-buttons">
				<button class="gifts-modal-button gifts-modal-quotas-button-remove">Excluir</button>
				<button class="gifts-modal-button gifts-modal-button-cancel">Cancelar</button>
			</div>
		</div>
	</div>

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista criar-presentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent13.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.filtro-cotas')

				<div class="col-md-9 dados-container">
					<div class="row">
						<div class="col-md-4 pL30">
							<h4 class="gifts-title">Lista de adicionados</h4>
						</div>
						<div class="gifts-filter col-md-8">
							<ul class="gifts-filter-categories">
								<li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i> <span>brinquedos</span></a></li><li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-clothes"></i> <span>roupas</span></a></li><li class="gifts-filter-categories-item active"><a href="{{ route('usuario.meus-aniversarios.presentes.cotas', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i> <span>cotas</span></a></li>
							</ul>
						</div>
					</div>
					<!-- MODAL -->
					<!-- MODAL CONCLUIR -->
					<div class="modal-lista-item modal-lista-concluir hidden">
						<h6>Lista de Cotas</h6>
						<span>Parabéns! Você está perto de finalizar sua lista de cotas!</span>
						<p>
							<img src="{{ asset('assets/site/images/presentinho-icone.png') }}">
							<small class="gifts-box-number-header-total">{{ count($quotasTotal) }}</small> selecionados
						</p>
						<div class="gifts-box-number-footer dados-container">
							<a class="gifts-box-number-submit col-md-12" href="#">Concluir Lista</a>
						</div>
					</div>
					@if (count($party->cotas) > 0)
						<ul class="gifts-list" data-festa-id="{{ $party->id }}">
							@foreach($party->cotas as $cota)
								<li class="col-md-6 gifts-item " data-id="{{ $cota->id }}">
									<div class="row">
										<div class="col-md-5">
											@if (file_exists('storage/quotas/' . $cota->foto))
												<img src="{{ url('storage/quotas/' . $cota->foto) }}" class="gifts-item-image" width="100%">
											@else 
												<input type="hidden" value="{{ url('storage/quotas/' . $cota->foto) }}" width="100%">
											@endif
										</div>
										<div class="gifts-item-content col-md-7">
											<h5 class="gifts-item-title">{{ $cota->nome }}</h5>
											<p class="gifts-item-price-description">Valor total do presente:</p>
											<p class="gifts-item-price-value">R$ {{ number_format($cota->valor_total, 2) }}</p>
											@if ($cota->dividir_cota == 1)
												<p class="gifts-item-price-description">nº de cotas</p>
												<p class="gifts-item-price-value">{{ $cota->quantidade_cotas }} cotas</p>
												<p class="gifts-item-price-description">Valor da cota para presente</p>
												<p class="gifts-item-price-value">R$ {{ number_format($cota->valor_total / $cota->quantidade_cotas, 2) }}</p>
											@endif
										</div>
									</div>
									<div class="gifts-item-buttons">
										<button type="button" class="col-md-12 gifts-item-button gifts-quotas-button-remove">Retirar da lista</button>
									</div>
								</li>
							@endforeach
						</ul>
					@else
						<p>Nenhuma cota cadastrada.</p>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection