<?php

require_once "../classes/usuario.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$nome=isset($_GET["nome"])?$_GET["nome"]:"";
$idade=isset($_GET["idade"])?$_GET["idade"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";
$cpf=isset($_GET["cpf"])?$_GET["cpf"]:"";

if($acao == "salvar"){
    $id=isset($_GET["id"])?$_GET["id"]:"";

    if($id == 0){

         $user = new usuario($id, $nome, $idade, $cpf);
    
   
        $funcao = $user->inserir();
    header("location:../paginas../cadastro_usuario.php");
}
    else {

        $user = new usuario($id, $nome, $idade, $cpf);

    
        $funcao = $user->editar();
    header("location:../paginas../cadastro_usuario.php");

 //echo "entrou aqui  : ".$id;

}
}       
    
  if($acao == "excluir"){

    $user = new usuario($id, "", "", "");
    
   
$funcao = $user->excluir();
header("location:../paginas../cadastro_usuario.php");

//echo "entrou aqui  : ".$id;

}



    ?>
