<!-- Tela de controle dos artigos. -->
<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome_art = isset($_POST['nome_art']) ? $_POST['nome_art'] : "";
    $texto = isset($_POST['texto']) ? $_POST['texto'] : ""; 
    $infos = isset($_POST['infos']) ? $_POST['infos'] : "";   
    $ficheiroI = isset($_POST['ficheiroI']) ? $_POST['ficheiroI'] : ""; 
    $ficheiroII = isset($_POST['ficheiroII']) ? $_POST['ficheiroII'] : "";
    $astrofoto = isset($_POST['astrofoto']) ? $_POST['astrofoto'] : "";
    $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
  
  
    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
      
    if ($processo == "excluir"){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $art = artigo::Listar($buscar = 1, $procurar = $id);
        $user = new Usuario($id, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['sobre'],$_POST['regiao'],$_POST['website']);                 
        $resultado = $user->excluir();
        header("location:../php/artigos.php");
    }
   
    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $art = new artigo("", $_POST['nome_art'],  $_POST['texto'], $_POST['infos'], $_POST['ficheiroI'], $_POST['ficheiroII'], $_POST['astrofoto'],$_POST['idusuario']);                 
            $resultado = $user->inserir();
            header("location:../php/artigos.php");
        }else{
            $art = new artigo("", $_POST['nome_art'],  $_POST['texto'], $_POST['infos'], $_POST['ficheiroI'], $_POST['ficheiroII'], $_POST['astrofoto'],$_POST['idusuario']);                 
            $resultado = $art->editar();
            header("location:../php/artigos.php");

            }
    
        } 

//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM artigos WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_art'] = $linha['nome_art'];
        $dados['texto'] = $linha['texto'];
        $dados['infos'] = $linha['infos'];
        $dados['ficheiroI'] = $linha['ficheiroI'];
        $dados['ficheiroII'] = $linha['ficheiroII'];
        $dados['astrofoto'] = $linha['astrofoto'];
        $dados['idusuario'] = $linha['idusuario'];
       
    }
    return $dados;
}

?>