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
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

    require_once "../classes../usuario.class.php";
    require_once "../acao../acao_usuario.php";

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
   $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";

   
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : "";

    $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $data_nascimento);

$id_usuario = 0;

if($acao == "editar"){

 
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : "";
    
    $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $data_nascimento);
    
    $dados = $user->buscar($id_usuario);
    
    $user = new usuario($dados["id_usuario"],$dados["nome_usuario"] , $dados["login_usuario"], $dados["email_usuario"], $dados["data_nascimento"]);
    
    }
    ?>


</head>
<body>

<form method="get" action="../acao/acao_usuario.php" >

    id: <input readonly type="text" name="id_usuario"  value="<?php if($acao == "editar") echo $user->getid_usuario();  else echo 0;?>"> <br><br>
    Insira seu nome completo:      <input type="text" name="nome_usuario" value="<?php if($acao == "editar") echo $user->getnome_usuario();  else echo "";?>"> <br><br>
    Insira seu nome de login:              <input type="text" name="login_usuario" value="<?php if($acao == "editar") echo $user->getlogin_usuario();  else echo "";?>"> <br><br>
    Insira seu email:              <input type="text" name="email_usuario" value="<?php if($acao == "editar") echo $user->getemail_usuario();  else echo "";?>"> <br><br>
    Insira sua data de nascimento: <input type="text" name="data_nascimento" value="<?php if($acao == "editar") echo $user->getdata_nascimento();  else echo "";?>"> <br><br>

    <input type="submit" name="acao" value="salvar">
</form>

    <table border="1"> 

<tr>
    <th>id</th>
    <th>nome</th>
    <th>login</th>
    <th>email</th>
    <th>data de nascimento</th>

</tr>

    <?php

 //$pdo = Conexao::getInstance();
//  $consulta = $user->listar($tipo, $procurar);
    
// while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $consulta = usuario::listar($tipo, $procurar);
foreach($consulta as $linha){
    ?>

    <tr><td><?php echo $linha['id_usuario'];?></td>
    <td><?php echo $linha['nome_usuario'];?></td> 
    <td><?php echo $linha['login_usuario'];?></td> 
    <td><?php echo $linha['email_usuario'];?></td> 
    <td><?php echo $linha['data_nascimento'];?></td> 

    <td><a href="javascript:excluirRegistro('../acao/acao_usuario.php?acao=excluir&id_usuario=<?php echo $linha['id_usuario'];?>')">deletar</a></td>
    <td><a href='../paginas../cadastro_usuario.php?acao=editar&id=<?php echo $linha['id_usuario'];?>'>editar</a></td>
    </tr>

<?php } ?>
</table>
</body>
</html>