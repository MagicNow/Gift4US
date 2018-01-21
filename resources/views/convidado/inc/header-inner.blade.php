<div class="preview-header">
	<div class="preview-header-decor">
		@if ($party->foto)
			<img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image">
		@endif
	</div>
	<div class="preview-header-name">{{ $party->nome }}</div>
	<div class="preview-header-image-container text-center">
		<div class="preview-header-image-mask">&nbsp;</div>
	</div>
	<div class="preview-header-info">{{ $party->festa_dia }}.{{ $party->festa_mes }} | {{ date ('H:i',strtotime($party->festa_hora . ':' . $party->festa_minuto)) }}<br>
		{{ $party->idade_anos > 1 ? $party->idade_anos . ' anos' : ($party->idade_anos == 1 ? 'ano' : NULL) }}
		{{ $party->idade_meses > 1 ? $party->idade_meses . ' meses' : ($party->idade_meses == 1 ? 'mes' : NULL) }}
	</div>
</div>