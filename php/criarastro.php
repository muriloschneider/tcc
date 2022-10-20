
<!DOCTYPE html>
<?php  
    session_start();
    $id = $_SESSION['id'];
 ?>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaII.php";



    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idastro = isset($_POST['idastro']) ? $_POST['idastro'] : "";
    $nome = isset($_POST['nome_astro']) ? $_POST['nome_astro'] : "";
    $equipamento = isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
    $detalhes = isset($_POST['detalhes']) ? $_POST['detalhes'] : "";
    $ficheiro = isset($_POST['ficheiro']) ? $_POST['ficheiro'] : "";
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
    if ($processo == 'editar'){
        $idastro = isset($_GET['idastro']) ? $_GET['idastro'] : "";
        if ($idastro > 0){
            $astro = new Astrofotografia("","", "", "", "", "");
            $dados = $astro->listar(1, $idastro);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Criar Astrofotografia | ODISSEIA</title>
</head>

<body>
    <div class="container-fluid">
        <center>
        <form method="post" action="../controle/processaII.php">


            <input class="form-control" readonly  style="max-width:20%" type="hidden" name="idastro" id="idastro" value="<?php if($processo == "editar"){echo $dados[0]['idastro'];}?>"><br>
            
            Adicionar Ficheiro: <input class="form-control" style="max-width:20%"  name="ficheiro" id="ficheiro" type="text" required="true" value="<?php if ($processo == "editar"){echo $dados[0]['ficheiro'];}?>"><br>         
            
            Nome: <input class="form-control" style="max-width:20%" name="nome_astro" id="nome_astro" type="text" required="true" placeholder="Insira o Nome" value="<?php if ($processo == "editar"){echo $dados[0]['nome_astro'];}?>"><br>         
            
            Equipamento: <input class="form-control" style="max-width:20%" name="equipamento" id="equipamento" type="text" required="true" placeholder="Insira o Equipamento" value="<?php if ($processo == "editar"){echo $dados[0]['equipamento'];}?>"><br>         
            
            Detalhes de captura: <input class="form-control" style="max-width:20%"  name="detalhes" id="detalhes" type="text" required="true" placeholder="Insira a detalhes" value="<?php if ($processo == "editar"){echo $dados[0]['detalhes'];}?>"><br>         
            <br>
            <input class="form-control" style="max-width:20%"  name="idusuario" id="idusuario" type="hidden" required="true" placeholder="Insira a detalhes" value="<?php if ($processo == "editar"){echo $dados[0]['idusuario'];} else { echo $id; }?>"><br>         

                <br>
                <br>   
                <button class="btn btn-dark" name="processo" value="salvar" id="processo" type="submit">Salvar</button>     
        </form>  
</center>
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
