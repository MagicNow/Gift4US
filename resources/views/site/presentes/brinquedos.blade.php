@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_brinquedos.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

			<div class="gifts-container row col-md-offset-2">
				<div class="col-md-12 dados-container">
					<div class="gifts-filter clearfix">
						<ul class="gifts-filter-categories">
							<li class="gifts-filter-categories-item active"><a href="{{ route('usuario.meus-aniversarios.presentes.brinquedos', $party->id) }}"><i class="gifts-filter-categories-icon gifts-filter-categories-toys"></i> <span>brinquedos</span></a></li><li class="gifts-filter-categories-item"><a href="{{ route('usuario.meus-aniversarios.presentes.roupas', $party->id) }}"><i class="gifts-filter-categories-icon 
							gifts-filter-categories-clothes"></i> <span>roupas</span></a></li><li class="gifts-filter-categories-item"><a href="#"><i class="gifts-filter-categories-icon gifts-filter-categories-quotas"></i> <span>cotas</span></a></li>
						</ul>
						<form method="get" action="#">
							<div class="gifts-filter-select-container pull-right">
								<select class="gifts-filter-select" name="ordenacao">
									<option value=""></option>
									<option value="AZ" {{ $request->ordenacao == 'AZ' ? 'selected' : '' }}>A-Z</option>
									<option value="ZA" {{ $request->ordenacao == 'ZA' ? 'selected' : '' }}>Z-A</option>
								</select>
							</div>
						</form>
					</div>
					<p class="gifts-categories-intro text-center">Para facilitar o filtro de produtos, escolha abaixo os interesses do aniversariante.</p>
					<form method="get" action="{{ route('usuario.meus-aniversarios.presentes.brinquedos.lista', $party->id) }}">
						<ul class="gifts-categories-list row" data-festa-id="{{ $party->id }}">
							@if (isset($categories) && count($categories) > 0)
								<?php $y = 1; $x = 1; ?>
								@foreach ($categories as $category)
									@if (!empty($category->produtos) && count($category->produtos) > 0)
										@if ($y == 1)
											<li class="row gifts-categories-row">
										@endif
										@if ($x == 1)
											<div class="col-md-6 gifts-categories-column">
										@endif
											<div class="col-md-3 gifts-categories-item {{ in_array($category->id, $selected) ? 'active' : '' }}" data-id="{{ $category->id }}">
												<img src="{{ asset('assets/site/images/passo_5_icone_presente.png') }}" alt="{{ $category->nome }}" width="62" class="gifts-categories-icon red">
												<img src="{{ asset('assets/site/images/img-presente-out.png.png') }}" alt="{{ $category->nome }}" width="62" class="gifts-categories-icon orange">
												<p class="gifts-categories-text">{{ $category->nome }}</p>
											</div>
										@if ($x == 4)
											</div>
											<?php $x = 1; ?>
										@else
											<?php $x++ ?>
										@endif

										@if ($y == 8)
											</li>
											<?php $y = 1; ?>
										@else
											<?php $y++ ?>
										@endif
									@endif
								@endforeach

								@if ($x < 4)
									</div>
								@endif

								@if ($y < 8)
									</li>
								@endif
							@else
								Nenhuma categoria cadastrada
							@endif
						</ul>
						<button type="submit" name="enviar" class="gifts-categories-submit">ESCOLHER PRODUTOS</button>
						<a href="{{ route('usuario.meus-aniversarios.novo.festa', [$party->id, 5]) }}" class="form-birthday-submit" style="text-align: center; color: #acacac; font-size: 17px;">voltar a etapa anterior</a>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
