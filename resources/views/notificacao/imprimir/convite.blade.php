<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Imprimir Convite Complementar</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/notificacoes/css/styles.css') }}"/>
	</head>
	<body>
		<page size="A4">
			@for ($i = 0; $i < 21; $i++)
				<div class="convite">
					<img src="{{ asset('assets/notificacoes/images/logo-rodape.png') }}" class="imglogo" />
					<div class="texto">
						<img src="{{ asset('assets/notificacoes/images/um.png') }}" />
						<br/>
						<b>acesse:GIFT4US.COM.BR</b>
						<br/>
						<img src="{{ asset('assets/notificacoes/images/dois.png') }}"  />
						<br/>
						<span>Insira o nome do aniversariante
						ou o código {{ $party->codigo }}
						</span>
						<br/>
						<img src="{{ asset('assets/notificacoes/images/tres.png') }}"  />
						<br/>
						<span>{{ $party->confirma_presenca === 0 ? 'Encontre' : 'Confirme sua presença
									e encontre' }} a lista de presentes</span>
					</div>
				</div>
			@endfor
		</page>
	</body>
</html>