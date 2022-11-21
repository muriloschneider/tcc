
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
    <link rel=" shortcut icon" href="../imagens/favicon.png " type="image/x-icon">   
    <link rel="stylesheet" href="../css/cad.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar <?php echo $dados[0]['nome_art']?> | ODISSEIA</title>
</head>
<style>
 header{
        background-color: #74030e;
        font-family: 'Hammersmith One', sans-serif;
        opacity: 90%;
        padding: 2%;
    }

    
    a:hover{
        color: #74030e;
    }
    
    input{
    background: none; 
    border: black;
    color: white;
    padding-left: -1%;
    font-size: 100%;
    border-radius: 5px;
    font-family: 'Hammersmith One', sans-serif;
    }
    
    td{
        padding: 1em 4em 1em;
        border-bottom: 4px dashed rgb(7, 52, 7);
        font-family: 'Hammersmith One', sans-serif;
        color: white;
    }
    table{
        margin: 0% 5%;
        background-color: #74030e;
        max-width: 100%;
        padding: -1em;
        resize: none;
        text-align: left;
        overflow-y: scroll;
        max-height: 100%;
    }

    a{
        text-decoration: none;
        color: white;
        font-family: 'Hammersmith One', sans-serif;

    }

    button{
        text-decoration: none;
        color: white;
        font-family: 'Hammersmith One', sans-serif;

    }

    .art1{
        box-sizing: border-box;
        margin-top: 22%;
        margin-bottom: -3%;
        margin-left: -59%;
        max-width: 125%;
        padding: 3%;
        background: #8C3001;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        position: static;
        height: 30em;
        width: 110%;
        resize: none;
        opacity: 90%;
    }

    .art2{
        margin-top: -88%;
        box-sizing: border-box;
        padding: 3%;
        background: #8C3001;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        margin-left: 55%;
        width: 105%;
        height: 30em;
        position: static;
        resize: none;
        /* opacity: 80%; */
    }

    .art3{
        box-sizing: border-box;
        margin-top: 56%;
        margin-bottom: -100%;
        margin-left: 10%;
        padding: 3%;
        background: #74030e;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        position: static;
        height: 25%;
        width: 80%;
        resize: none;
        opacity: 100%;  
    }
</style>

<body style = "overflow-y: scroll; background-color: black">

<div class="stars">
    <div class="twinkling">  
    <header style = "background-color: #BC5357; height: 12%; "> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -7.5%; padding-top: 5%"><a href="inicio.php">O D I S S E I A</a></p>
        <div  style = "padding-top: -10%; padding-left: 70%">
            <ul style = "margin-top: -15%;">
                    <li><a href="principalart.php">ARTIGOS </a></li>
                    <li><a href="meuperfil.php">MEU PERFIL </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
    </header>

   
    <section id="perfil">
        <form method="post" action="../controle/processaIII.php" enctype="multipart/form-data">
                <div><input name="idartigos" id="idartigos" type="hidden" required="true" placeholder="Insira o idartigo" value="<?php if($processo = "editar"){echo $dados[0]['idartigos'];}?>"></div>        

            <div class="art1">
           
            <a class="bt" href='artigos.php?idartigos=<?php echo $dados[0]['idartigos'];?>&idusuario=<?php echo $dados[0]['idusuario'];?>' style="margin-left: 7%; margin-right: 47%; font-family: 'Hammersmith One', sans-serif; color: white; background-color: #8C3001;">  
            VOLTAR </a>
            <img src="../imagens/arrow-return-left.svg" alt="" style="resize: none; margin-bottom: -0.1em; margin-left: -22.5em; margin-right: 20em">
            
            <div style = "margin-left: 80%; margin-top: -2.2em">
            <button name="processo" value="salvar" id="processo" type = "submit" style="margin-top: 1%; margin-left: -0.5em; border-radius: 5px; padding-left: 15%; width: fit-content; font-family: 'Hammersmith One', sans-serif; color: white; background-color: #8C3001;">  
            SALVAR</buttton>
            <img src="../imagens/check-lg.svg" alt="" style="resize: none; margin-top: -0.5em; margin-bottom: -5%; margin-left: -0.1em; margin-right: 0.5em;">
            </div>
                <p class="titulo1" style="text-transform: uppercase; font-size: 220%; margin-top: 5%; margin-left: 1.4%;">TÍTULO: <input name = "nome_art" id = "nome_art" required = "true" value="<?php if ($processo == "editar"){echo $dados[0]['nome_art'];}?>"></p>

                <br>      
                <div style="margin-bottom: 2%;">
                    <input hidden disabled name="texto" id="texto" type="text" required="true" placeholder=" " value="<?php if($processo = "editar"){ echo $dados[0]['texto'];}?>">
                    <textarea name = "texto" spellcheck="true" style="border-radius: 5px; background-color: #BC5357; overflow-y: scroll; padding-left: 1%; margin-top: -4%; font-size: 100%; border: none; height: 20em; width: 100%; resize: none; color: white; font-family: 'Hammersmith One', sans-serif;"><?php if($processo = "editar"){echo $dados[0]['texto'];}?></textarea>
                </div>    
    
                <div>
                </div>
                </div>

            <div class="art2">
            <div>
            <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase; padding-left: 1%; margin-top: 2%" class="titulo2">Informações</p><br><br>
                    <input hidden disabled name="infos" id="infos" type="text" class="form-control" value="<?php if($processo = "editar"){echo $dados[0]['infos'];}?>" placeholder="Insira os detalhes">
                    <textarea name = "infos" spellcheck="true"" style="border-radius: 5px; background-color: #BC5357; overflow-y: scroll; padding-left: 1%; margin-top: 1%; font-size: 100%; border: none; height: 10em; width: 100%; resize: none; color: white; font-family: 'Hammersmith One', sans-serif;"><?php if($processo = "editar"){echo $dados[0]['infos'];}?></textarea>
                   
                    <div>
                    <p style="text-transform: uppercase; padding-left: 1%; margin-top: 15%" class="titulo2">IMAGENS</p><br>
                    <input name="ficheiroI" id="ficheiroI" type="file" style = "margin-top: 20%; margin-left: -21.5%" required="true" placeholder="Insira o ficheiro" value="<?php if($processo = "editar"){echo $dados[0]['ficheiroI'];}?>"><br>
                    <input name="ficheiroII" id="ficheiroII" type="file" style = "margin-top: 4%;" required="true" placeholder="Insira o ficheiro" value="<?php if($processo = "editar"){echo $dados[0]['ficheiroII'];}?>">                    
                   </div>
                </div>
                </div>    
                </div>
                
                <p class="titulo2" style="margin-left: 16%; margin-top: 10%; margin-bottom: -1%;">ANEXAR SUAS ASTROFOTOGRAFIAS</p></div>
          
    <br>
            <div class="art3" style="overflow-y: scroll;">
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
                <div style = "display:block; padding-left: -2%; height: -101em; margin-bottom: -55%">
                <input type="checkbox" <?php echo $check ?> name = "anexo[]" id = "<?php echo $linha['ficheiro']?>"value = "<?php echo $linha['idastro']?>"><img src="<?php echo $linha['ficheiro'];?>"  style = "padding-left: -1%; border-radius: 5px; margin-top: -2%; margin-left: 2.5%; width: 115px; height: 75px;"><p style = "padding-left: -1%; margin-left: 5.3%; margin-top: 1%; width: 7em; height: 5em; font-size: 110%; text-transform: uppercase; border: none; resize: none; color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $linha['nome_astro']?></p> 
            
                    <?php } ?>
                    </div>
            </div>

            <input class="form-control" style="max-width:20%"  name="idusuario" id="idusuario" type="hidden" required="true" placeholder="Insira a detalhes" value="<?php if ($processo == "editar"){echo $dados[0]['idusuario'];} else { echo $id; }?>"><br>         
        </div>  
        </form>
    </section>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
