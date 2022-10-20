<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $login = isset($_POST['login']) ? $_POST['login'] : ""; 
    $email = isset($_POST['email']) ? $_POST['email'] : "";   
    $senha = isset($_POST['senha']) ? $_POST['senha'] : ""; 
    $sobre = isset($_POST['sobre']) ? $_POST['sobre'] : "";
    $regiao = isset($_POST['regiao']) ? $_POST['regiao'] : "";
    $website = isset($_POST['website']) ? $_POST['website'] : "";
  
  
    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
      
    if ($processo == "excluir"){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $user = Usuario::Listar($buscar = 1, $procurar = $id);
        $user = new Usuario($id, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['sobre'],$_POST['regiao'],$_POST['website']);                 
        $resultado = $user->excluir();
        header("location:../php/login.php");
    }
   
    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $user = new Usuario("", $_POST['nome'],  $_POST['login'], $_POST['email'], $_POST['senha'], "", "", "");                 
            $resultado = $user->inserir();
            header("location:../php/confirmacaologin.php");
        }else{
            $user = new Usuario($id, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['sobre'],$_POST['regiao'],$_POST['website']);              
            $resultado = $user->editar();
            header("location:../php/meuperfil.php");

            }
    
        } 

//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM usuario WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome'] = $linha['nome'];
        $dados['login'] = $linha['login'];
        $dados['email'] = $linha['email'];
        $dados['senha'] = $linha['senha'];
        $dados['sobre'] = $linha['sobre'];
        $dados['regiao'] = $linha['regiao'];
        $dados['website'] = $linha['website'];
       
    }
    return $dados;
}



    include_once "../classes/autoload.php";
    if ($processo == "login"){
        if(isset($_POST['login']) && isset($_POST['senha']) && Usuario::efetuarLogin($_POST['login'], $_POST['senha'])) {
            header("Location:../php/meuperfil.php");
        } else if(isset($_POST['login']) && isset($_POST['senha'])) {
            header("Location:../php/login.php?msg=Login Não-Efetuado!");
        }
    }





?>