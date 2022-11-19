<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once ("../conf/Conexao.php");
    
    $data = Artigos::dados($_GET["idartigos"])[0];
    $processo = isset($_GET["processo"]) ? $_GET["processo"] : "";
    $idusuario = isset($_GET["idusuario"]) ? $_GET["idusuario"] : 0;


    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/cad.css">
    <title>Artigos | ODISSEIA </title>
</head>
<style>
    header{
        background-color: #74030e;
        font-family: 'Hammersmith One', sans-serif;
        opacity: 90%;
        padding: 2%;
    }

    a:hover{
        color: #BC5357;
    }

    .art1{
        box-sizing: border-box;
        margin-top: 15%;
        margin-left: -70%;
        max-width: 125%;
        padding: 3%;
        background: #74030e;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        position: static;
        height: 30em;
        resize: none;
        opacity: 90%;
    }

    .art2{
        margin-top: -100%;
        box-sizing: border-box;
        padding: 3%;
        background: #74030e;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        margin-left: 60%;
        width: 120%;
        height: 30em;
        position: static;
        resize: none;
        /* opacity: 80%; */
    }
</style>

<body>

    <div class="stars">
    <div class="twinkling">    
    <header> 
        <center>
        <div class="menu">
            <ul>
            <li><a href="inicio.php">Início  &ensp;|</a></li>
                    <li><a href="meuperfil.php">Meu Perfil  &ensp;|</a></li>
                    <li><a href="principalart.php">Artigos  &ensp;|</a></li>
                    <li><a href="">Simulações  &ensp;|</a></li>
                    <li><a href="../controle/processaI.php?processo=login">Encerrar Sessão</a></li>
                </ul> 
        </div>
        </center>
    </header>
    <section id="perfil">
        <form method="post" action="../controle/processaIII.php" class="card-perfil">


            <div class="art1" style="overflow-y: scroll;">
                <div><input disabled name="idartigos" id="idartigos" type="hidden" required="true" placeholder="Insira o idartigo" value="<?php echo $data['idartigos'];?>"></div>        
                                                    
                <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase;" class="titulo2">Título</p><br><br>
                    <input hidden disabled name="nome_art" id="nome_art" type="text" required="true" 
                    placeholder="Insira o nome_art" value="<?php echo $data['nome_art'];?>">
                    <textarea spellcheck="true" disabled rows="4" cols="30" style="resize: none; background-color: white; color: black; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['nome_art'];?></textarea>
                </div>    
                            
                <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase;" class="titulo2">Texto</p><br><br>
                    <input hidden disabled name="texto" id="texto" type="text" required="true" 
                    placeholder=" " value="<?php echo $data['texto'];?>">
                    <textarea spellcheck="true" disabled rows="4" cols="30" style="resize: none; background-color: white; color: black; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['texto'];?></textarea>
                </div>    
                            
                <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase;" class="titulo2">Informações</p><br><br>
                    <input hidden disabled name="infos" id="infos" type="text" class="form-control" 
                    value="<?php echo $data['infos'];?>" placeholder="Insira os detalhes">
                    <textarea spellcheck="true" disabled rows="4" cols="30" style="resize: none; background-color: white; color: black; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['infos'];?></textarea>
                </div>
                        
                <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase;" class="titulo2">Ficheiro I</p><br><br>
                    <input hidden disabled name="ficheiro" id="ficheiro" type="text" required="true" 
                    placeholder="Insira o ficheiro" value="<?php echo $data['ficheiroI'];?>">
                    <img src="<?php echo $data['ficheiroI'];?>" alt="" style="width: 35%; margin-left: 5%;">
                </div>    

                <div>
                    <p style="text-transform: uppercase;" class="titulo2">Ficheiro II</p><br><br>
                    <input hidden disabled name="ficheiroII" id="ficheiroII" type="text" required="true" 
                    placeholder="Insira o ficheiroII" value="<?php echo $data['ficheiroII'];?>"></div>  
                    <img src="<?php echo $data['ficheiroII'];?>" alt="" style="width: 35%; margin-left: 5%;"> 
                </div>

            <div class="art2" style="overflow-y: scroll;">
            <div>
                <p class="titulo2" style="margin-left: 5%; margin-top: 1%; margin-bottom: 2%;">ASTROFOTOGRAFIAS ANEXADAS</p></div>
            <br>
                    <?php 
                        $pdo = Database::iniciaConexao();
                        $lista = Anexos::listar(2, $data['idartigos']); 
                        foreach ($lista as $linha){
                    ?> 
                    <div>
                        <br>
                        <img src="<?php echo $linha['ficheiro'];?>" alt="" style="width: 35%; margin-left: 5%;">
                    </div>
                    <br>
                    <a class="bt" style="float: right; margin-top: 41.5%; margin-right: 8%;" href='astrofoto.php?idastro=<?php echo $linha['idastro'];?>&idusuario=<?php echo $linha['idusuario'];?>'>
                    Ver mais
                    </a>
                    <?php } ?>
            <br>
                </select> 
                <br>
                <a class="bt2" style="margin-top: 34%; margin-left: 5%;" href='criarartigo.php?idartigos=<?php echo $data['idartigos'];?>&processo=editar'>  Editar Artigo </a><br>
            </div>
        </form>
    </section>
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
