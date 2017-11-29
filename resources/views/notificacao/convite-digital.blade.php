@extends('site/master')

@section('content')
	<style>
		header,footer{
			display:none!important;
		}
		@if ($pages > 1)
			.dados-container .convite{
				margin:20px auto;
			}
			.convite-container{
				width:1186px!important;
				/*margin: 0 auto;*/
			}
		@else
			body {
				background: none;
			}

			.dados-container .convite{
				margin: 0;
			}
		@endif
	</style>
	<div class="convite-container">
		@for ($i = 0; $i < $pages; $i++)
			<div class="dados-container">
				@include('notificacao.inc.convite')
			</div>
		@endfor
	</div>
@endsection

@section('scripts')

@endsection
