<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    $idartigos = isset($_POST['idartigos']) ? $_POST['idartigos'] : 0;   
    if(empty($idartigos)){
        $idartigos = isset($_GET['idartigos']) ? $_GET['idartigos'] : 0;   
    };
    
    $idastro = isset($_POST['idastro']) ? $_POST['idastro'] : 0;   
    if(empty($idastro)){
        $idastro = isset($_GET['idastro']) ? $_GET['idastro'] : 0;   
    };

    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
  
    if ($processo == "excluir"){

        $vet = Anexos::Listar($tipo = 1, $procurar = $idartigos);
        $artigos = new Artigos($idartigos, $vet[0]['nome_art'],$vet[0]['texto'],$vet[0]['infos'],$vet[0]['ficheiro'],$vet[0]['ficheiroII'],$vet[0]['idusuario']);     
        $resultado = $artigos->excluir();
        header("location:../php/artigos.php");
    }

    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($idartigos == 0 || $idartigos == ""){
            $idartigos = isset($_GET['idartigos']) ? $_GET['idartigos'] : 0;
            //artigos
            $artigos = new Artigos("", $_POST['nome_art'], $_POST['texto'],  $_POST['infos'], $_POST['ficheiro'], $_POST['ficheiroII'], $_POST['idusuario']);                 
            $novoId = $artigos->inserir();
            //anexo
            if (isset($_POST['idastro'])){
                foreach($_POST['idastro'] as $idastro){
                    $anexo = new Anexos($idastro, $novoId);
                    $anexo->inserir();
                }
            }
            header("location:../php/artigos.php?idartigos=$novoId&idastro=$idastro");
        }else{
            $artigos = new Artigos($idartigos, $_POST['nome_art'], $_POST['texto'], $_POST['infos'], $_POST['ficheiro'], $_POST['ficheiroII'] , $_POST['idusuario']);                 
            $resultado = $artigos->editar();
            //anexo
            if (isset($_POST['idastro'])){
                $anexo = new Anexos("", $idartigos);
                $anexo->inserir();
                foreach($_POST['idastro'] as $idastro){
                    $anexo = new Anexos($idastro, $idartigos);
                    $anexo->inserir2();
                }
            }
            header("location:../php/artigos.php?idartigos=$idartigos&idusuario=$usuario");

            }
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