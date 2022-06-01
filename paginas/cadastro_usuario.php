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
   
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";

$id = 0;

?>
</head>
<body>

<form method="get" action="../acao/acao_usuario.php" >

    Insira seu nome completo:     <input type="text" name="nome" value=""> <br><br>
    Insira sua idade:    <input type="text" name="idade" value=""> <br><br>
    Insira seu CPF:    <input type="text" name="cpf" value=""> <br><br>

    <input type="submit" name="acao" value="salvar">
    <table border="1"> 

    <tr>
    <th>id</th>
    <th>nome</th>
    <th>idade</th>
    <th>cpf</th>
</tr>

    <?php

 $pdo = Conexao::getInstance();
 if($procura==""){
     $consulta = $pdo->query("SELECT * FROM usuario 
                              WHERE id_usuario LIKE '$procurar%'
                              ORDER BY id_usuario");
 }

  else if($procura=="pro1"){
     $consulta = $pdo->query("SELECT * FROM usuario 
                              WHERE nome_usuario LIKE '$procurar%'
                              ORDER BY nome_usuario");
 }

  else if($procura=="pro2"){
     $consulta = $pdo->query("SELECT * FROM usuario 
                              WHERE idade_usuario LIKE '$procurar%' 
                              ORDER BY idade_usuario");
 }



 else if($procura=="pro3"){
     $consulta = $pdo->query("SELECT * FROM usuario 
                              WHERE cpf_usuario LIKE '$procurar%' 
                              ORDER BY cpf_usuario");
}


    
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <tr><td><?php echo $linha['id_usuario'];?></td>
    <td><?php echo $linha['nome_usuario'];?></td> 
    <td><?php echo $linha['idade_usuario'];?></td> 
    <td><?php echo $linha['cpf_usuario'];?></td> 
    <td><a href="javascript:excluirRegistro('../acao../acao_usuario.php?acao=excluir&id=<?php echo $linha['id_usuario'];?>')">deletar</a></td>
    </tr>
</form>
<?php } ?>
</table>
</body>
</html>