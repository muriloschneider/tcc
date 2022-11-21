<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    
    $pathToSave = "../imgart/";
    if ($_FILES) { // Verificando se existe o envio de arquivos.
        if ($_FILES['ficheiroI']) { // Verifica se o campo não está vazio.
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['ficheiroI']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['ficheiroI']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms', '.docx', '.jpeg', 'png', '.jpg'))) {
                echo('Permitido apenas arquivos doc, xls, pdf, docx, txt, jpeg, png e jpg.');
                die;
            }
            move_uploaded_file($tmpName, $dir.$name);
            $ficheiroI = "../imgart/".$_FILES['ficheiroI']['name'];
            
        }  
    }

    $pathToSave = "../imgart/";
    if ($_FILES) { // Verificando se existe o envio de arquivos.
        if ($_FILES['ficheiroII']) { // Verifica se o campo não está vazio.
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['ficheiroII']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['ficheiroII']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms', '.docx', '.jpeg', 'png', '.jpg'))) {
                echo('Permitido apenas arquivos doc, xls, pdf, docx, txt, jpeg, png e jpg.');
                die;
            }
            move_uploaded_file($tmpName, $dir.$name);
            $ficheiroII = "../imgart/".$_FILES['ficheiroII']['name'];
            
        }  
    }

    $idartigos = isset($_POST['idartigos']) ? $_POST['idartigos'] : 0;   
    if(empty($idartigos)){
        $idartigos = isset($_GET['idartigos']) ? $_GET['idartigos'] : 0;   
    };

    $nome_art = isset($_POST['nome_art']) ? $_POST['nome_art'] : "";
    $texto = isset($_POST['texto']) ? $_POST['texto'] : "";
    $infos = isset($_POST['infos']) ? $_POST['infos'] : ""; 
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0; 
    $anexo = isset($_POST['anexo']) ? $_POST['anexo'] : array(); 

    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
  
    if ($processo == "excluir"){

        $vet = Artigos::Listar($tipo = 1, $procurar = $idartigos);
        $artigos = new Artigos($idartigos, $vet[0]['nome_art'],$vet[0]['texto'],$vet[0]['infos'],$ficheiroI ,$ficheiroII,$vet[0]['idusuario']);     
        $resultado = $artigos->excluir();
        header("location:../php/artigos.php");
    }

    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($idartigos == 0 || $idartigos == ""){
            //artigos
            $artigos = new Artigos("", $_POST['nome_art'], $_POST['texto'],  $_POST['infos'], $ficheiroI, $ficheiroII, $_POST['idusuario']);                 
            $_POST['idartigos'] = $artigos->inserir();
            
                foreach($anexo as $idastro){
                    $anexos = new Anexos($idastro, $_POST['idartigos']);
                    $anexos->inserir();
                }
            
            header("location:../php/principalart.php");

        }else{
            $artigos = new Artigos($_POST['idartigos'], $nome_art, $texto, $infos, $ficheiroI, $ficheiroII , $usuario);                 
            $resultado = $artigos->editar();
            $verificar = Anexos::excluir($_POST['idartigos']);
            //anexo
                foreach($anexo as $idastro){
                    $anexos = new Anexos($idastro, $_POST['idartigos']);
                    $anexos->inserir();
                }
            }
            
            header("location:../php/artigos.php?idartigos=".$_POST['idartigos']."&idusuario=$usuario");
        }

    

        
//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Artigos WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_art'] = $linha['nome_art'];
        $dados['texto'] = $linha['texto'];
        $dados['infos'] = $linha['infos'];
        $dados['ficheiro'] = $linha['ficheiro'];
        $dados['idusuario'] = $linha['idusuario'];
       
    }
    return $dados;
}
?>