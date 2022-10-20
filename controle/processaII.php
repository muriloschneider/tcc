<?php
    require_once "../conf/Conexao.php";
    include_once "../classes/autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome = isset($_POST['nome_astro']) ? $_POST['nome_astro'] : "";
    $equipamento = isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
    $detalhes = isset($_POST['detalhes']) ? $_POST['detalhes'] : ""; 
    $ficheiro = isset($_POST['ficheiro']) ? $_POST['ficheiro'] : "";   
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : ""; 

    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}else{$processo="";}
   
    if ($processo == "excluir"){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $astro = Astrofotografia::Listar($buscar = 1, $procurar = $id);
        $astro = new Astrofotografia($id, $_POST['nome_astro'], $_POST['detalhes'], $_POST['equipamento'], $_POST['ficheiro'], $_POST['idusuario']);                 
        $resultado = $astro->excluir();
        header("location:../php/astrofotografia.php");
    }
   
    if ($processo == "salvar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $astro = new Astrofotografia($id, $_POST['nome_astro'], $_POST['detalhes'], $_POST['equipamento'], $_POST['ficheiro']);                 
            $resultado = $astro->inserir();
            header("location:../php/meuperfil.php");
        }else{
            $astro = new Astrofotografia($id, $_POST['nome_astro'], $_POST['detalhes'], $_POST['equipamento'], $_POST['ficheiro'], $_POST['idusuario']);                 
            $resultado = $astro->editar();
            header("location:../php/editarastro.php");

            }
    
        } 

//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM astrofotografia WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_astro'] = $linha['nome_astro'];
        $dados['detalhes'] = $linha['detalhes'];
        $dados['equipamento'] = $linha['equipamento'];
        $dados['ficheiro'] = $linha['ficheiro'];
        $dados['idusuario'] = $linha['idusuario'];
       
    }
    return $dados;
}
?>