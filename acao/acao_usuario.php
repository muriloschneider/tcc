<?php

require_once "../classes/usuario.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$id_usuario=isset($_GET["id_usuario"])?$_GET["id_usuario"]:"";
$nome_usuario=isset($_GET["nome_usuario"])?$_GET["nome_usuario"]:"";
$login_usuario=isset($_GET["login_usuario"])?$_GET["login_usuario"]:"";
$email_usuario=isset($_GET["email_usuario"])?$_GET["email_usuario"]:"";
$senha=isset($_GET["senha"])?$_GET["senha"]:"";
$id_usuario=isset($_GET["id_usuario"])?$_GET["id_usuario"]:"";
$sobre=isset($_GET["sobre"])?$_GET["sobre"]:"";
$regiao=isset($_GET["regiao"])?$_GET["regiao"]:"";
$site=isset($_GET["site"])?$_GET["site"]:"";

$user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $senha, $sobre, $regiao, $site);


if($acao == "salvar"){

    if($id_usuario == 0){

        $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $senha, $sobre, $regiao, $site);
    
   
        $funcao = $user->inserir();
}
    else {

        $user = new usuario($id_usuario, $nome_usuario, $login_usuario, $email_usuario, $senha, $sobre, $regiao, $site);

    
        $funcao = $user->editar();

 //echo "entrou aqui  : ".$id_usuario;

}
header("location:../paginas../cadastro_usuario.php");

}       
    
  if($acao == "excluir"){

    $user = new usuario($id_usuario, "", "", "", "", "", "", "");
    
   
$funcao = $user->excluir();
header("location:../paginas../cadastro_usuario.php");

//echo "entrou aqui  : ".$id_usuario;

}



    ?>
