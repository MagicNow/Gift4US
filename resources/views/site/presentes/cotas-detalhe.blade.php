@extends('site/master')

@section('content')

	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedos-lista criar-presentes">
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent03.png') }}" class="presentinho col-xs-12 col-sm-12 col-md-6" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.filtro-cotas')

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('site.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					<ul class="gifts-list" data-festa-id="3">

					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
