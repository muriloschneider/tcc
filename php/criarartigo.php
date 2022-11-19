
<!DOCTYPE html>
<?php  
    session_start();
    $id = $_SESSION['id'];
 ?>
<?php
    include_once "../classes/autoload.php";
    require_once "../conf/Conexao.php";


    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idartigos = isset($_POST['idartigos']) ? $_POST['idartigos'] : 0;
    $nome_art = isset($_POST['nome_art']) ? $_POST['nome_art'] : "";
    $texto = isset($_POST['texto']) ? $_POST['texto'] : "";
    $infos = isset($_POST['infos']) ? $_POST['infos'] : "";
    $ficheiro = isset($_POST['ficheiroI']) ? $_POST['ficheiroI'] : "";
    $ficheiroII = isset($_POST['ficheiroII']) ? $_POST['ficheiroII'] : "";
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0;

    if ($processo == 'editar'){
        $idartigos = isset($_GET['idartigos']) ? $_GET['idartigos'] : "";
        if ($idartigos > 0){
            $dados = Artigos::Listar(1, $idartigos);
           
    }
}
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/csstcc2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Criar Novo Artigo | ODISSEIA</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
}

*::-webkit-scrollbar{
    width: 1px;
    height: 5px;
}
  
*::-webkit-scrollbar-track{
    background: none;
}
  
*::-webkit-scrollbar-thumb{
    background-color: #700100;
    border-radius: 20px;
    border: 1px solid white;
}
</style>

<body>
<div class="caixaI">
<div class="caixaII">
<div class="caixaIII">


<div class="caixaV">


    <p class="titulo2" style="font-size: 170%; margin-top: 1%; margin-left: 5%;"> CRIAR ARTIGO </p><img src="../imagens/config.png" style="width:2%; margin-top: 1.5%;">

        <form method="post" action="../controle/processaIII.php" enctype="multipart/form-data">

            <div class="color1" style="margin-top: 1%;">
        
            <input class="form-control" readonly  style="max-width:20%" type="hidden" name="idartigos" id="idartigos" value="<?php if($processo == "editar"){echo $dados[0]['idartigos'];}?>">

            <div class="red" style="margin-top: 0%;">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Título</p>
            <input class="inputast" style="max-width:80%" placeholder="Insira o título do artigo" name="nome_art" id="nome_art" type="text" required="true" value="<?php if ($processo == "editar"){echo $dados[0]['nome_art'];}?>">
            </div>

            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Texto</p>
            <textarea  name = "texto" id = "texto" placeholder="Texto do Artigo" class="texta"><?php if ($processo == "editar"){echo $dados[0]['texto'];}?></textarea>
            </div>

            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Informações</p>
            <textarea  name = "infos" id = "infos" class="texta" placeholder="Informações adicionais"><?php if ($processo == "editar"){echo $dados[0]['infos'];}?></textarea>
            </div>
        
            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Adicionar Ficheiro</p>
            <input class="inputast" style="max-width:100%; height: 20px;" name="ficheiroI" id="ficheiroI" type="file" value="<?php if ($processo == "editar"){echo $dados[0]['ficheiroI'];}?>">
            </div>

            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Adicionar Ficheiro</p>
            <input class="inputast" style="max-width:100%; height: 20px;" name="ficheiroII" id="ficheiroII" type="file" value="<?php if ($processo == "editar"){echo $dados[0]['ficheiroII'];}?>">
            </div>

            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Anexar Astrofotografia</p><br>
        <br>
                <?php 
                    $pdo = Database::iniciaConexao();
                    $consultaA = $pdo->query("SELECT idastro FROM anexos WHERE idartigos = $idartigos");
                    $anexos = $consultaA->fetchAll();
                    $consulta = $pdo->query("SELECT * FROM astrofotografia WHERE idusuario = $id");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                        $check = "";
                       foreach($anexos as $anexo){  
                            if (in_array($linha['idastro'], $anexo)){
                                $check = "checked";
                            }
                        }
                ?> 
                <div class = "anexo1" style = "display: block; padding: 2%">
                <input type="checkbox" <?php echo $check ?> name = "anexo[]" id = "<?php echo $linha['ficheiro']?>" value = "<?php echo $linha['idastro']?>"><img src="<?php echo $linha['ficheiro'];?>" width="60" height="60"> 
            
                    <?php } ?>
                    </div>
            </div>

            <input class="form-control" style="max-width:20%"  name="idusuario" id="idusuario" type="hidden" required="true" placeholder="Insira a detalhes" value="<?php if ($processo == "editar"){echo $dados[0]['idusuario'];} else { echo $id; }?>"><br>         

   
                <button class="voltar" name="processo" value="salvar" id="processo" type="submit">Salvar</button>

           </form>  
</center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
