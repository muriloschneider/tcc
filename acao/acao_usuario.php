<?php

require_once "../classes/usuario.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$nome=isset($_GET["nome"])?$_GET["nome"]:"";
$idade=isset($_GET["idade"])?$_GET["idade"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";
$cpf=isset($_GET["cpf"])?$_GET["cpf"]:"";

if($acao == "salvar"){

    $user = new usuario($id, $nome, $idade, $cpf);
    
   
$funcao = $user->inserir();
    header("location:../paginas../cadastro_usuario.php");
       
}       
    
 else if($acao == "excluir"){

    $user = new usuario($id, "", "", "");
    
   
$funcao = $user->excluir();
header("location:../paginas../cadastro_usuario.php");

//echo "entrou aqui  : ".$id;

}

// else if($acao == "editar"){

//     $quad = new quadrado($id, "", "");
    
   
// $quad->editar();
// header("location:index.php");

// //echo "entrou aqui  : ".$id;

// }

    ?>
