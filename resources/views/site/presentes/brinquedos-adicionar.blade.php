@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_aniversario_presente_roupas_ent04.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }}

			<div class="gifts-container row col-md-offset-2">
				@include('site.inc.gifts')

				<div class="col-md-9 dados-container">
					<div class="row">
						<div class="col-md-4">
							<h4 class="gifts-title">Adicionar brinquedos</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
