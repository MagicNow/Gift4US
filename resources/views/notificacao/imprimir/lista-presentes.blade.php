<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Imprimir Lista de Presentes</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/notificacoes/css/styles.css') }}"/>
	</head>
	<body>
		<page size="A4">
			<div class="topo">
				<div class="preview-header-decor">
					<img src="{{ asset('assets/notificacoes/images/moldura.png') }}" alt="Festa" class="preview-banner-item-image">
					<div class="nome">
						<h1>{{ $party->nome }}</h1>
						<span>{{ $party->festa_dia }}/{{ $party->festa_mes }}/{{ $party->festa_ano }}</span>
						<div>
							<b>Lista de presentes</b>
							<br>
							<span class="ico"><img src="{{ asset('assets/notificacoes/images/ico.png') }}"> 102</span>
						</div>
						<div class="direita">
							<img src="{{ asset('assets/notificacoes/images/logohorizontal.png') }}">
							<div>
								<b>R$ 7.879,90</b>
								<span>(para resgatar)</span>
							</div>
						</div>
					</div>
					<div class="tira"></div>
					<div class="preview-banner-item-foto-container">
						<img src="{{ asset('storage/birthdays/' . $party->foto) }}" alt="Heitor" class="preview-banner-item-foto">
					</div>
				</div>
			</div>
			<table>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
				<tr>
					<td>ABIGAIL RODRIGUES</td>
					<td>email@email.com.br</td>
					<td>Boneco doidera ed. especial</td>
					<td>irá presentear</td>
				</tr>
			</table>
			<div class="arrow-esquerda">
				1/2
			</div>
			<div class="arrow-direita">
				1/14
			</div>
		</page>
	</body>
</html>