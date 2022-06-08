<?php

require_once "../classes/usuario.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$id_usuario=isset($_GET["id_usuario"])?$_GET["id_usuario"]:"";
$nome_usuario=isset($_GET["nome_usuario"])?$_GET["nome_usuario"]:"";
$login_usuario=isset($_GET["login_usuario"])?$_GET["login_usuario"]:"";
$email_usuario=isset($_GET["email_usuario"])?$_GET["email_usuario"]:"";
$data_nascimento=isset($_GET["data_nascimento"])?$_GET["data_nascimento"]:"";
$id_usuario=isset($_GET["id_usuario"])?$_GET["id_usuario"]:"";

$user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $data_nascimento);


if($acao == "salvar"){

    if($id_usuario == 0){

         $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $data_nascimento);
    
   
        $funcao = $user->inserir();
}
    else {

        $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $data_nascimento);

    
        $funcao = $user->editar();

 //echo "entrou aqui  : ".$id_usuario;

}
header("location:../paginas../cadastro_usuario.php");

}       
    
  if($acao == "excluir"){

    $user = new usuario($id_usuario, "", "", "", "");
    
   
$funcao = $user->excluir();
header("location:../paginas../cadastro_usuario.php");

//echo "entrou aqui  : ".$id_usuario;

}



    ?>
