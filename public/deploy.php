<?php
$token = "9f53457d31a734ce49ca8d18e0e3c95c";
if($_REQUEST['token'] == $token)
    $tokenValido = true;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Usando GIT para atualizar arquivos no servidor de hospedagem</title>
</head>
<body>
<pre>
    <?php
        if($tokenValido) {
            $exec = shell_exec("git pull 2>&1");
            echo $exec;
 
            
        } else {
            echo "Sem permissão";//Deve exibir o log e um botão para para executar a atualização
        }
    ?>
</pre>
</body>
</html>