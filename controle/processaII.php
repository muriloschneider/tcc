<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";


    $pathToSave = "../imgastro/";
    if ($_FILES) { // Verificando se existe o envio de arquivos.
        if ($_FILES['ficheiro']) { // Verifica se o campo não está vazio.
            $dir = $pathToSave; // Diretório que vai receber o arquivo.
            $tmpName = $_FILES['ficheiro']['tmp_name']; // Recebe o arquivo temporário.
            $name = $_FILES['ficheiro']['name']; // Recebe o nome do arquivo.
            preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
            if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms', '.docx', '.jpeg', 'png', '.jpg'))) {
                echo('Permitido apenas arquivos doc, xls, pdf, docx, txt, jpeg, png e jpg.');
                die;
            }
            move_uploaded_file($tmpName, $dir.$name);
            $ficheiro = "../imgastro/".$_FILES['ficheiro']['name'];
        }  
    }

    $idastro = isset($_POST['idastro']) ? $_POST['idastro'] : 0;   
        if(empty($idastro)){
    $idastro = isset($_GET['idastro']) ? $_GET['idastro'] : 0;   
         };

    $nome = isset($_POST['nome_astro']) ? $_POST['nome_astro'] : "";
    $equipamento = isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
    $detalhes = isset($_POST['detalhes']) ? $_POST['detalhes'] : ""; 
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0; 

    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
  
        if ($processo == "excluir"){

        $vet = Astrofotografia::Listar($tipo = 1, $procurar = $idastro);
        $astro = new Astrofotografia($idastro, $vet[0]['nome_astro'],$vet[0]['equipamento'],$vet[0]['detalhes'],$ficheiro[0],$vet[0]['idusuario']);     
        $resultado = $astro->excluir();
        header("location:../php/principal.php");
    }
   
    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($idastro == 0 || $idastro = ""){
            $astro = new Astrofotografia("", $_POST['nome_astro'], $_POST['equipamento'],  $_POST['detalhes'], $ficheiro, $_POST['idusuario']);                 
            $resultado = $astro->inserir();
            header("location:../php/principal.php");
        }else{
            if(isset($_FILES)){
            $astro = new Astrofotografia($_POST['idastro'], $nome, $equipamento, $detalhes, $ficheiro, $usuario);                 
            $resultado = $astro->editar();
            }else{

            $astro = new Astrofotografia($_POST['idastro'], $nome, $equipamento, $detalhes, $ficheiro, $usuario);        
            $resultado = $astro->editar();
        }
            header("location:../php/minhaastro.php?idastro=".$_POST['idastro']."&idusuario=$usuario");

        }
    
        } 
    
//Consulta os dados dentro do banco.
    function buscarDados($idastro){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM astrofotografia WHERE idastro = $idastro");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['idastro'] = $linha['idastro'];
        $dados['nome_astro'] = $linha['nome_astro'];
        $dados['equipamento'] = $linha['equipamento'];
        $dados['detalhes'] = $linha['detalhes'];
        $dados['ficheiro'] = $linha['ficheiro'];
        $dados['idusuario'] = $linha['idusuario'];
       
    }
    return $dados;
}
?>