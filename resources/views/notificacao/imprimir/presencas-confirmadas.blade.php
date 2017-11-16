<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Imprimir Presenças Confirmadas</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/notificacoes/css/styles.css') }}"/>
	</head>
	<body>
		@if (count($presencas) > 0)
			@foreach ($presencas as $key => $presenca)
				<page size="A4">
					<center>
						<div class="presenca">
							<div class="topo">
								<div class="preview-header-decor">
									<img src="{{ asset('assets/notificacoes/images/moldura.png') }}" alt="Festa" class="preview-banner-item-image">
									<div class="nome">
										<h1>{{ $party->nome }}</h1>
										<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }} {{ sprintf('%02d', $party->festa_hora) }}h{{ sprintf('%02d', $party->festa_minuto) }}</span>
										<div class="direita">
											<img src="{{ asset('assets/notificacoes/images/logohorizontal.png') }}">
											{{-- <div>
												<span>Responsável: Marlene Albuquerque
												<br>
												marlene@albuquerque.com.br
												<br>
												(11) 99792-4356</span>
											</div> --}}
										</div>
									</div>
									<div class="tira"></div>
									<div class="preview-banner-item-foto-container">
										<img src="{{ asset('storage/birthdays/' . $party->foto) }}" alt="Heitor" class="preview-banner-item-foto">
									</div>
								</div>
							</div>
							<h1 class="titulo">Presenças Confirmadas {{ $party->confirmacaoPresenca->count() }}</h1>
							<table>
								@php
								$i = 0;
								@endphp
								@foreach ($presenca as $item)
									@if ($i === 0)
										<tr>
									@endif
										<td>
											<fieldset class="form-birthday-first col-xs-4 col-sm-4">
												<div class="radio">
													<label data-image="" class="form-birthday-sex-label">
													{{ $item->nome }}
													<input type="radio" name="ciclo_vida"><span></span>
													</label>
												</div>
											</fieldset>
										</td>
									@if ($i === 1)
										</tr>
										@php
										$i = 0;
										@endphp
									@else
										@php
										$i++;
										@endphp
									@endif
								@endforeach

								@if ($i === 1)
										<td></td>
									</tr>
								@endif
							</table>

							<div class="arrow-direita">
								{{ $key + 1 }}/{{ $paginas }}
							</div>
						</div>
					</center>
				</page>
			@endforeach
		@endif
	</body>
</html>