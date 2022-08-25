<!DOCTYPE html>
<html lang="en">
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="../css/teste.css"/>


    <?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classes../usuario.class.php";
    require_once "../acao../acao_cadastro_usuario.php";

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : "";

    ?>

    </head>
    <body>

<div class="baixo">
    
<div class="um">

<div class="dois">

<div class="tres">

<div class="quatro">

<h1 style="color: #ffffff"> CADASTRO </h1>


<form method="get" action="../acao/acao_cadastro_usuario.php" >

                    <input type="text" placeholder="nome" name="Nome_usuario" value="<?php if($acao == "editar") echo $user->getnome_usuario();  else echo "";?>"> <br><br>
                    <input type="text" placeholder="Usuário" name="login_usuario" value="<?php if($acao == "editar") echo $user->getlogin_usuario();  else echo "";?>"> <br><br>
                    <input type="text" placeholder="E-mail" name="email_usuario" value="<?php if($acao == "editar") echo $user->getemail_usuario();  else echo "";?>"> <br><br>
                    <input type="text" placeholder="Senha" name="senha" value="<?php if($acao == "editar") echo $user->getsenha();  else echo "";?>"> <br><br>

    <button type="submit" name="acao" value="salvar" class="btn btn-danger">Cadastrar</button>
</form>

    </div>
    </div>
    </div>
    </div>
<div class="imagem">
    </div>
    </div>
    
</table>
</body>

</html>