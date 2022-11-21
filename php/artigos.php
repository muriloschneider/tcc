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
    <link rel="stylesheet" href="../css/cad.css">
    <link rel=" shortcut icon" href="../imagens/favicon.png " type="image/x-icon">   

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
        color: #74030e;
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


    .art1{
        box-sizing: border-box;
        margin-top: 20%;
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
        margin-top: -89.5%;
        box-sizing: border-box;
        padding: 3%;
        background: #8C3001;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        margin-left: 56%;
        width: 100%;
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
        padding: 1%;
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

    <div class="stars" style>
    <div class="twinkling">    
    <header style = "background-color: #BC5357;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 60%">
            <ul>
                    <li><a href="principalart.php">ARTIGOS </a></li>
                    <li><a href="criarartigo.php">CRIAR ARTIGO </a></li>
                    <li><a href="meuperfil.php">MEU PERFIL </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
    </header>
    <section id="perfil">
        <form method="post" action="../controle/processaIII.php">

            <div class="art1">
            <a style="margin-top: 0%; margin-left: 2%;" href='editarartigo.php?idartigos=<?php echo $data['idartigos'];?>&processo=editar'> EDITAR ARTIGO <img src="../imagens/pencil-square.svg" alt="" style="width: 1.5em; margin-left: 1%; margin-bottom: -1%;"></a><br>

                <div><input disabled name="idartigos" id="idartigos" type="hidden" required="true" placeholder="Insira o idartigo" value="<?php echo $data['idartigos'];?>"></div>        
                <p class="titulo1" style="text-transform: uppercase; font-size: 220%; margin-top: 5%; margin-left: 1.4%; "><?php echo $data['nome_art'];?></p>

                <br>      
                <div style="margin-bottom: 2%;">
                    <input hidden disabled name="texto" id="texto" type="text" required="true" placeholder=" " value="<?php echo $data['texto'];?>">
                    <textarea spellcheck="true" disabled  style=" padding-left: 1%; overflow-y: scroll; font-size: 100%; border: none; height: 20em; width: 100%; resize: none; background: #8C3001; color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['texto'];?></textarea>
                </div>    
    
                <div>
                </div>
                </div>

            <div class="art2">
            <div>
            <div style="margin-bottom: 2%;">
                    <p style="text-transform: uppercase; padding-left: 1%; margin-top: 2%" class="titulo2">Informações</p><br><br>
                    <input hidden disabled name="infos" id="infos" type="text" class="form-control" value="<?php echo $data['infos'];?>" placeholder="Insira os detalhes">
                    <textarea spellcheck="true" disabled  style="padding-left: 1%; overflow-y: scroll; margin-top: 5%; font-size: 100%; border: none; height: 10em; width: 100%; resize: none; background: #8C3001; color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['infos'];?></textarea>
                   
                    <input hidden disabled name="ficheiro" id="ficheiro" type="text" required="true" placeholder="Insira o ficheiro" value="<?php echo $data['ficheiroI'];?>">
                    <img src="<?php echo $data['ficheiroI'];?>" alt="" style="object-fit: cover; width: 11em; height: 8em; border-radius: 5px; margin-left: 12%; margin-top: -5%;">
                    <img src="<?php echo $data['ficheiroII'];?>" alt="" style="object-fit: cover; width: 11em; height: 8em;border-radius: 5px;  margin-left: 5%; margin-top: 15%;">
                    
                </div>
                </div>    
                </div>
                
                <p class="titulo2" style="margin-left: 19%; margin-top: 10%; margin-bottom: -5%;">ASTROFOTOGRAFIAS ANEXADAS</p></div>
          
    <br>
            <div class="art3" style="overflow-y: scroll;">
            <?php 
                        $pdo = Database::iniciaConexao();
                        $lista = Anexos::listar(2, $data['idartigos']); 
                        foreach ($lista as $linha){
                    ?> 
                    <table style = "padding-left: -3%">   
                <tr>
                <td><p style = "font-family: 'Hammersmith One', sans-serif;"><?php echo $linha['nome_astro'];?></p></td>
                <td><img src="<?php echo $linha['ficheiro'];?>" alt="" style="width: 25%; height: 25%; margin-left: -15%; border-radius: 5px"></td>
                <td><a href='minhaastro.php?idastro=<?php echo $linha['idastro'];?>&idusuario=<?php echo $linha['idusuario'];?>'><img src="../imagens/vermais.svg" alt="" style="width: 1.5em;"></td>   
                </tr>
                    <?php } ?>
                        </table>
                        </div> 
                        
        </form>
    </section>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
