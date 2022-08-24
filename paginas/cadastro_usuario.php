<!DOCTYPE html>
<html lang="en">
<head>
    
<script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="css../teste.css"/>


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

    $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $senha, $sobre, $regiao, $site);

$id_usuario = 0;

    ?>


</head>
<body>

<form method="get" action="../acao/acao_cadastro_usuario.php" >

    id: <input readonly type="text" name="id_usuario"  value="<?php if($acao == "editar") echo $user->getid_usuario();  else echo 0;?>"> <br><br>
    Insira seu nome completo:      <input type="text" name="nome_usuario" value="<?php if($acao == "editar") echo $user->getnome_usuario();  else echo "";?>"> <br><br>
    Usuário:      <input type="text" name="login_usuario" value="<?php if($acao == "editar") echo $user->getlogin_usuario();  else echo "";?>"> <br><br>
    Insira seu email:              <input type="text" name="email_usuario" value="<?php if($acao == "editar") echo $user->getemail_usuario();  else echo "";?>"> <br><br>
    Insira sua senha:              <input type="text" name="senha" value="<?php if($acao == "editar") echo $user->getsenha();  else echo "";?>"> <br><br>

    <input type="submit" name="acao" value="salvar">
</form>

    <table border="1"> 

<tr>
    <th>id</th>
    <th>nome</th>
    <th>login</th>
    <th>email</th>
    <th>senha</th>
    


</tr>

    <!-- <?php

 //$pdo = Conexao::getInstance();
//  $consulta = $user->listar($tipo, $procurar);
    
// while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

//     $consulta = usuario::listar($tipo, $procurar);
// foreach($consulta as $linha){
    ?> -->

    <!-- <tr><td><?php// echo $linha['id_usuario'];?></td>
    <td><?php //echo $linha['nome_usuario'];?></td> 
    <td><?php// echo $linha['login_usuario'];?></td> 
    <td><?php// echo $linha['email_usuario'];?></td> 
    <td><?php //echo $linha['senha'];?></td> 
    <td><?php //echo $linha['sobre'];?></td> 
    <td><?php// echo $linha['regiao'];?></td> 
    <td><?php //echo $linha['site'];?></td>  -->
<!-- 
    <td><a href="javascript:excluirRegistro('../acao/acao_editar_usuario.php?acao=excluir&id_usuario=<?php echo $linha['id_usuario'];?>')">deletar</a></td>
    <td><a href='../paginas../editar_usuario.php?acao=editar&id=<?php //echo $linha['id_usuario'];?>'>editar</a></td> -->
    </tr>

<?php //} ?>
</table>
</body>
</html>