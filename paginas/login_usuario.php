<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classes../usuario.class.php";
    //require_once "../acao../acao_cadastro_usuario.php";

    // $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    // $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    // $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";
    // $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : "";

    $user = new usuario($id_usuario, "", $login_usuario, "", $senha, "", "", "");

$id_usuario = 0;

    ?>


</head>
<body>

<form method="get" action="../acao/acao_cadastro_usuario.php" >

    Usuário:      <input type="text" name="login_usuario" value="<?php if($acao == "editar") echo $user->getlogin_usuario();  else echo "";?>"> <br><br>
   
    Senha:              <input type="text" name="senha" value="<?php if($acao == "editar") echo $user->getsenha();  else echo "";?>"> <br><br>

    <input type="submit" name="acao" value="salvar">
</form>

    <table border="1"> 



</table>
</body>
</html>