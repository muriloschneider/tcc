<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

$quad = new quadrado("1", 0, "");
?>
</head>
<body>

<form method="post" action="acao../acao_usuario.php" >

    Insira seu nome completo:     <input type="text" name="" value=""> <br><br>
    Insira sua idade:    <input type="text" name="" value=""> <br><br>
    Insira seu CPF:    <input type="text" name="" value=""> <br><br>

    <input type="submit" name="">
    
</form>
</body>
</html>