<!DOCTYPE html>

<?php  
    session_start();
    $id = $_SESSION['id'];
?>
<?php

    include_once ("../classes/autoload.php");
    include_once "../controle/processaII.php";
    require_once "../conf/Conexao.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $buscar = isset($_POST["buscar"]) ? $_POST["buscar"] : 0; 
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" shortcut icon" href="../imagens/favicon.png " type="image/x-icon">   
    <link rel="stylesheet" href="../css/cad.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title>Astrofotografias | ODISSEIA</title>
</head>
<style>
    body{
        background-color: black;
        color: #fff;
    }

    header{
        font-family: 'Hammersmith One', sans-serif;
        opacity: 90%;
        padding: 2%;
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
    }

    a:hover{
        color: #74030e;
    }

    td{
        padding: 1em 4em 1em;
        border-bottom: 4px dashed rgb(7, 52, 7)
;
    }

    .main{
    position: fixed;
    top: 50%;
    left: 50%;
    height: 1px;
    width: 1px;
    background-color: #fff;
    border-radius: 50%;
    box-shadow: -42vw -4vh 0px 0px #fff,25vw -41vh 0px 0px #fff,-20vw 49vh 0px 1px #fff,5vw 40vh 1px 1px #fff,29vw 19vh 1px 0px #fff,-44vw -13vh 0px 0px #fff,46vw 41vh 0px 1px #fff,-3vw -45vh 0px 1px #fff,47vw 35vh 1px 0px #fff,12vw -8vh 1px 0px #fff,-34vw 48vh 1px 1px #fff,32vw 26vh 1px 1px #fff,32vw -41vh 1px 1px #fff,0vw 37vh 1px 1px #fff,34vw -26vh 1px 0px #fff,-14vw -49vh 1px 0px #fff,-12vw 45vh 0px 1px #fff,-44vw -33vh 0px 1px #fff,-13vw 41vh 0px 0px #fff,-36vw -11vh 0px 1px #fff,-23vw -24vh 1px 0px #fff,-38vw -27vh 0px 1px #fff,16vw -19vh 0px 0px #fff,28vw 33vh 1px 0px #fff,-49vw -4vh 0px 0px #fff,16vw 32vh 0px 1px #fff,36vw -18vh 1px 0px #fff,-25vw -30vh 1px 0px #fff,-23vw 24vh 0px 1px #fff,-2vw -35vh 1px 1px #fff,-25vw 9vh 0px 0px #fff,-15vw -34vh 0px 0px #fff,-8vw -19vh 1px 0px #fff,-20vw -20vh 1px 1px #fff,42vw 50vh 0px 1px #fff,-32vw 10vh 1px 0px #fff,-23vw -17vh 0px 0px #fff,44vw 15vh 1px 0px #fff,-40vw 33vh 1px 1px #fff,-43vw 8vh 0px 0px #fff,-48vw -15vh 1px 1px #fff,-24vw 17vh 0px 0px #fff,-31vw 50vh 1px 0px #fff,36vw -38vh 0px 1px #fff,-7vw 48vh 0px 0px #fff,15vw -32vh 0px 0px #fff,29vw -41vh 0px 0px #fff,2vw 37vh 1px 0px #fff,7vw -40vh 1px 1px #fff,15vw 18vh 0px 0px #fff,25vw -13vh 1px 1px #fff,-46vw -12vh 1px 1px #fff,-18vw 22vh 0px 0px #fff,23vw -9vh 1px 0px #fff,50vw 12vh 0px 1px #fff,45vw 2vh 0px 0px #fff,14vw -48vh 1px 0px #fff,23vw 43vh 0px 1px #fff,-40vw 16vh 1px 1px #fff,20vw -31vh 0px 1px #fff,-17vw 44vh 1px 1px #fff,18vw -45vh 0px 0px #fff,33vw -6vh 0px 0px #fff,0vw 7vh 0px 1px #fff,-10vw -18vh 0px 1px #fff,-19vw 5vh 1px 0px #fff,1vw 42vh 0px 0px #fff,22vw 48vh 0px 1px #fff,39vw -8vh 1px 1px #fff,-6vw -42vh 1px 0px #fff,-47vw 34vh 0px 0px #fff,-46vw 19vh 0px 1px #fff,-12vw -32vh 0px 0px #fff,-45vw -38vh 0px 1px #fff,-28vw 18vh 1px 0px #fff,-38vw -46vh 1px 1px #fff,49vw -6vh 1px 1px #fff,-28vw 18vh 1px 1px #fff,10vw -24vh 0px 1px #fff,-5vw -11vh 1px 1px #fff,33vw -8vh 1px 0px #fff,-16vw 17vh 0px 0px #fff,18vw 27vh 0px 1px #fff,-8vw -10vh 1px 1px #fff;
  
  /* stars were too big with the layers above but left the code in case no one cares  -- as in, if noone's just that  one other loner who actually cares    */
  
  box-shadow: 24vw 9vh 1px 0px #fff,12vw -24vh 0px 1px #fff,-45vw -22vh 0px 0px #fff,-37vw -40vh 0px 1px #fff,29vw 19vh 0px 1px #fff,4vw -8vh 0px 1px #fff,-5vw 21vh 1px 1px #fff,-27vw 26vh 1px 1px #fff,-47vw -3vh 1px 1px #fff,-28vw -30vh 0px 1px #fff,-43vw -27vh 0px 1px #fff,4vw 22vh 1px 1px #fff,36vw 23vh 0px 0px #fff,-21vw 24vh 1px 1px #fff,-16vw 2vh 1px 0px #fff,-16vw -6vh 0px 0px #fff,5vw 26vh 0px 0px #fff,-34vw 41vh 0px 0px #fff,1vw 42vh 1px 1px #fff,11vw -13vh 1px 1px #fff,48vw -8vh 1px 0px #fff,22vw -15vh 0px 0px #fff,45vw 49vh 0px 0px #fff,43vw -27vh 1px 1px #fff,20vw -2vh 0px 0px #fff,8vw 22vh 0px 1px #fff,39vw 48vh 1px 1px #fff,-21vw -11vh 0px 1px #fff,-40vw 45vh 0px 1px #fff,11vw -30vh 1px 0px #fff,26vw 30vh 1px 0px #fff,45vw -29vh 0px 1px #fff,-2vw 18vh 0px 0px #fff,-29vw -45vh 1px 0px #fff,-7vw -27vh 1px 1px #fff,42vw 24vh 0px 0px #fff,45vw -48vh 1px 0px #fff,-36vw -18vh 0px 0px #fff,-44vw 13vh 0px 1px #fff,36vw 16vh 0px 1px #fff,40vw 24vh 0px 0px #fff,18vw 11vh 0px 0px #fff,-15vw -23vh 1px 0px #fff,-24vw 48vh 0px 1px #fff,27vw -45vh 1px 0px #fff,-2vw -24vh 0px 1px #fff,-15vw -28vh 0px 0px #fff,-43vw 13vh 1px 0px #fff,7vw 27vh 1px 0px #fff,47vw 5vh 0px 0px #fff,-45vw 15vh 1px 1px #fff,-5vw -28vh 0px 1px #fff,38vw 25vh 1px 1px #fff,-39vw -1vh 1px 0px #fff,5vw 0vh 1px 0px #fff,49vw 13vh 0px 0px #fff,48vw 10vh 0px 1px #fff,19vw -28vh 0px 0px #fff,4vw 7vh 0px 0px #fff,21vw 21vh 1px 1px #fff,-15vw -15vh 0px 1px #fff,-6vw -42vh 1px 0px #fff,-15vw 48vh 1px 1px #fff,-23vw 25vh 1px 1px #fff,-48vw 25vh 0px 1px #fff,-31vw -19vh 0px 1px #fff,4vw 37vh 1px 1px #fff,-43vw 28vh 0px 0px #fff,3vw -25vh 0px 1px #fff,-39vw 14vh 0px 1px #fff,-40vw 31vh 0px 1px #fff,35vw -36vh 1px 1px #fff,16vw 49vh 0px 0px #fff,6vw 39vh 0px 0px #fff,3vw -35vh 0px 1px #fff,-44vw -2vh 1px 0px #fff,-6vw 21vh 1px 0px #fff,48vw 9vh 1px 1px #fff,-43vw 30vh 1px 1px #fff,29vw -12vh 1px 1px #fff,-48vw 13vh 1px 0px #fff,-42vw 32vh 1px 1px #fff,34vw 15vh 1px 1px #fff,29vw -37vh 1px 1px #fff,28vw 2vh 0px 0px #fff;
  animation: zoom 16s alternate infinite; 
}

@keyframes zoom {
    0%{
        transform: scale(1);
    }
    100%{
        transform: scale(1.5);
    }
}

    button{
        background-color: black;
        border-color: transparent;
        border-radius: 4px;
        color: white;
        width: 3em;
        margin-left: -15em; 
        margin-top: -4em;
        padding: 0.2em 0em;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    button:hover{
        -webkit-filter: drop-shadow(2px 2px 6px white);
        filter: drop-shadow(2px 2px 6px white);
    }

    #procurar{
        height: 1.5em;
        padding-top: 0.4em;
        padding-left: 0.5em;
        border-radius: 4px;
        margin-left: -40%; 
        margin-top: -1em; 
        border: none;
    }

</style>

<body style = "overflow-y: scroll";>

<header style = "background-color: #BC5357;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 66%">
            <ul>
                    <li><a href="criarastro.php">NOVA PUBLICAÇÃO </a></li>
                    <li><a href="meuperfil.php">MEU PERFIL </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
        
    </header>
        </div>
    
        </center>

  

    <content>
    <!-- <div class="stars">
    <div class="twinkling">   -->

  <div class="main"></div>
        <div style="margin-top: 3em; text-transform: uppercase;">
        <p class = "titulo1" style = "font-size: 200%">ASTROFOTOGRAFIAS</p>
        <table>
            <br>
            <?php
                $lista = Astrofotografia::listar2($buscar, $procurar, $id); 
                foreach ($lista as $linha) { 
            ?>
                <tr>
                <td><p style = "font-family: 'Hammersmith One', sans-serif;"><?php echo $linha['nome_astro'];?></p></td>
                <td><img src="<?php echo $linha['ficheiro'];?>" alt="" style="width: 20%; height: 20%;"></td>
                    <td><a href='astrofoto.php?idastro=<?php echo $linha['idastro'];?>&idusuario=<?php echo $linha['idusuario'];?>'> <img src="../imagens/vermais.svg" alt="" style="width: 1.5em;"></td>
                    </a></td>                   
                </tr>
            <?php 
                }
            ?> 
        </table>
<br>
<div class="main"></div>
        <div style="margin-top: 3em; text-transform: uppercase;">
        <p class = "titulo1" style = "font-size: 200%">SUAS ASTROFOTOGRAFIAS</pack>
        <table>
            <br>
            <?php
              $procurar2 = isset($_POST["procurar"]) ? $_POST["procurar"] : $_SESSION['id'];; 
              $buscar2 = isset($_POST["buscar"]) ? $_POST["buscar"] : 3; 
                $lista2 = Astrofotografia::listar($buscar2, $procurar2); 
                foreach ($lista2 as $linha2) { 
            ?>
                <tr>
                <td style = ""><p style = "font-family: 'Hammersmith One', sans-serif;"><?php echo $linha2['nome_astro'];?></p></td>
                <td><img src="<?php echo $linha2['ficheiro'];?>" alt="" style="width: 20%; height: 20%; margin-left: 10%"></td>
                <td><a href='minhaastro.php?idastro=<?php echo $linha2['idastro'];?>&idusuario=<?php echo $linha2['idusuario'];?>'><img src="../imagens/vermais.svg" alt="" style="width: 1.5em;"></td>
                    </a></td>                   
                </tr>
            <?php 
                }
            ?> 
        </table>
<br>
        <br>
        <!-- <button class="voltar"><a class="linkvol" href="criarastro.php">Nova Publicação</a></button> -->
            <br>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </content>
</body>
</html>
