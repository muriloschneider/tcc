<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaII.php";

    session_start();
    $id = $_SESSION['id'];

    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idastro = isset($_POST['idastro']) ? $_POST['idastro'] : 0;
    $nome_astro = isset($_POST['nome_astro']) ? $_POST['nome_astro'] : "";
    $equipamento = isset($_POST['equipamento']) ? $_POST['equipamento'] : "";
    $detalhes = isset($_POST['detalhes']) ? $_POST['detalhes'] : "";
    $ficheiro = isset($_POST['ficheiro']) ? $_POST['ficheiro'] : "";
    $usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0;
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/cad.css"/>
    <title> <?php echo $titulo ?> | ODISSEIA </title>
</head>
<style>
    input{
    background: none; 
    border: black;
    color: white;
    font-size: 100%;
    border-radius: 5px;
    font-family: 'Hammersmith One', sans-serif;
}
</style>
<body>

    <div class="stars">
    <div class="twinkling">  
    <header style = "background-color: #BC5357;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 59%">
            <ul>
                    <li><a href="principal.php">ASTROFOTOS </a></li>
                    <li><a href="criarastro.php">NOVA PUBLICAÇÃO </a></li>
                    <li><a href="meuperfil.php">MEU PERFIL </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
    </header>

    <section>
        <form method="post" action="../controle/processaII.php" enctype="multipart/form-data">
        <div><input disabled name="idastro" id="idastro" type="hidden" required="true" placeholder="Insira o idastro" value=""></div>    

        <p class = "titulo1" style="text-transform: uppercase; font-size: 220%; margin-top: 2.3%; ">NOME: <input name = "nome_astro" id = "nome_astro" required = "true" value=""></p>
        <div class="color1" style="margin-top: 0.1%; background: #74030e; padding-top: -1%">
        <center>
            <div><img src="../imagens/card-image.svg" alt="" style="object-fit: cover; width: 365px; height: 364.40px; border-radius: 5px; margin-top:-1%"></div>
            <br>
            <a class="bt" href='principal.php' style="margin-left: -5%; margin-right: 47%; font-family: 'Hammersmith One', sans-serif; maxx; color: white; background-color: #74030e;">  
            VOLTAR </a>
            <img src="../imagens/arrow-return-left.svg" alt="" style="resize: none; margin-bottom: -0.5em; margin-left: -23em; margin-right: 20em">
            
            <div style = "margin-left: 40%; margin-top: -1.6em">
            <button class="bt2" name="processo" value="salvar" id="processo" type = "submit" style="padding-right: -10%; margin-left: -1em; width: fit-content; height: fit-content; margin-top: -10em; font-family: 'Hammersmith One', sans-serif; maxx; color: white; background-color: #74030e;">  
            SALVAR</buttton>
            <img src="../imagens/check-lg.svg" alt="" style="resize: none; margin-top: -15em; margin-bottom: -5%; margin-left: -0.1em; margin-right: -1em;">
            </div>
        </center>

        </div>

        <div class="color2" style="overflow-y: scroll; border-radius: 5px; margin-top: -39%; background: #8C3001;">
                                                                        
            <div>
                <p style="text-transform: uppercase; font-size: 150%;" class="titulo2">Equipamento</p><br><br>
                <textarea name="equipamento" required = "true" style="font-size: 100%; padding-top: 1%; padding-left: 1%; border-radius: 5px; color: white; height: 100%; width: 100%;  border: none; background-color: #BC5357; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"></textarea>
            </div>         
        </div>
        
        <div class="color3" style="overflow-y: scroll; background: #8C3001; margin-top: 0.5%; border-radius: 5px;">
            <div>
            <p style="text-transform: uppercase; font-size: 150%" class="titulo2">Detalhes de Captura</p><br><br>
                <textarea name="detalhes" required = "true" style="font-size: 100%; padding-top: 1%; padding-left: 1%; border-radius: 5px; color: white; height: 100%; width: 100%; border: none; background-color: #BC5357; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"></textarea>
            </div>
        </div>
        <div class="color3" style="overflow-y: scroll; background: #8C3001; margin-top: 0.5%; border-radius: 5px;">
            <div>
            <p style="text-transform: uppercase; font-size: 150%; margin-bottom: 10%" class="titulo2">ADICIONAR IMAGEM</p><br>
            <input required = "true" style="color: white; font-family: 'Hammersmith One', sans-serif; margin-top: -2%" name="ficheiro" id="ficheiro" type="file"></div>
            </div>
            <input class="form-control" style="max-width:20%"  name="idusuario" id="idusuario" type="hidden" required="true" placeholder="Insira a detalhes" value="<?php echo $id; ?>">        
        </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
