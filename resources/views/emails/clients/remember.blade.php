<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Gift4US | Recuperação de Senha</title>
</head>
<body style="margin: 0; padding: 0;">
	<table cellspacing="0" width="560" cellpadding="0" border="0" style="text-align: center; margin: 0 auto; display: block;">
        <tbody>
            <tr>
                <td align="left" valign="top" bgcolor="#ffffff"></td>
                <td align="left" valign="top" bgcolor="#ffffff">
                    <table width="536" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:13pt;color:#696969;line-height:20px">
                        <tbody>
                            <tr height="65">
                                <td align="left" valign="top">
                                    <p><strong>Olá, </strong>{{ strtoupper($cliente->nome) }}<br><br>Conforme solicitado, segue sua senha abaixo:</p>
                                </td>
                            </tr>
                            <tr height="50">
                                <td align="left" valign="top">
                                    <p><strong>Senha: </strong>{{ $senha }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    <p>Atenção: para efetuar seu login corretamente, verifique as letras maiúsculas e minúsculas. Lembre-se que sua senha é pessoal e intransferível.</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <a href="{{ url('/') }}"><img src="{{ asset('assets/home/images/btn-acesse-site.png') }}" alt="Acesse o site" width="183"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
	</table>
</body>
</html>