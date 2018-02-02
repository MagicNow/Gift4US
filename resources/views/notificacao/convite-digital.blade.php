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
			}
		@else
			body {
				background: none;
				width: 533px;
			}

			.convite-container{
				width:533px !important;
				display: inline-block;
			}

			.dados-container .convite{
				margin: 0;
			}

			.dados-container .col-md-11 {
				padding: 0;
				width: 100%;
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
