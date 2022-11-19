<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    $pathToSave = "../imguser/";
    if ($_FILES) { // Verificando se existe o envio de arquivos.
        if ($_FILES['ficheiro']) { // Verifica se o campo não está vazio.
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['ficheiro']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['ficheiro']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms', '.docx', '.jpeg', 'png', '.jpg', ''))) {
                echo('Permitido apenas arquivos doc, xls, pdf, docx, txt, jpeg, png e jpg.');
                die;
            }
            move_uploaded_file($tmpName, $dir.$name);
            $ficheiro = "../imguser/".$_FILES['ficheiro']['name'];
        }  
    }

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    if(empty($id)){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;   
    };
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $login = isset($_POST['login']) ? $_POST['login'] : ""; 
    $email = isset($_POST['email']) ? $_POST['email'] : "";   
    $senha = isset($_POST['senha']) ? $_POST['senha'] : ""; 
    $sobre = isset($_POST['sobre']) ? $_POST['sobre'] : "";
    $regiao = isset($_POST['regiao']) ? $_POST['regiao'] : "";
    $website = isset($_POST['website']) ? $_POST['website'] : "";

  
    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
      
    if ($processo == "excluir"){

        $vet = Usuario::Listar($tipo = 1, $procurar = $id);
        $user = new Usuario($id, $vet[0]['nome'],$vet[0]['login'],$vet[0]['email'],$vet[0]['senha'], $vet[0]['sobre'], $vet[0]['regiao'], $vet[0]['website'], $ficheiro);     
        $resultado = $user->excluir();
        header("location:../php/meuperfil.php");
    }
   
    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $user = new Usuario("", $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], "", "", "", "");                 
            $resultado = $user->inserir();
            header("location:../php/confirmacaologin.php");
        }else{
            if(isset($_FILES)){
                $user = new Usuario($id, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['sobre'],$_POST['regiao'],$_POST['website'], $ficheiro);              
                $resultado = $user->editar();
            }else{
                $user = new Usuario($id, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['sobre'],$_POST['regiao'],$_POST['website'], "");              
                $resultado = $user->editar();
            }
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
        if(Usuario::efetuarLogin($_POST['login'], $_POST['senha'])) {
            header("Location:../php/inicio.php");
        } else if(!isset($_POST['login']) && !isset($_POST['senha'])) {
            header("Location:../php/login.php");
        } else if(isset($_POST['login']) && isset($_POST['senha'])) {
            header("Location:../php/login.php?msg=Login Não-Efetuado!");
        }
    }





?>