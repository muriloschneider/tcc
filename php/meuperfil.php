<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaI.php";
    
    session_start();
    $data = Usuario::dados($_SESSION['id'])[0];

    
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $id = isset($_SESSION['id'][0]) ? $_SESSION['id'][0] : 0;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $login = isset($_POST['login']) ? $_POST['login'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $sobre = isset($_POST['sobre']) ? $_POST['sobre'] : "";
    $regiao = isset($_POST['regiao']) ? $_POST['regiao'] : "";
    $website = isset($_POST['website']) ? $_POST['website'] : "";
    if ($processo == 'editar'){
        if ($id > 0){
            $dados = Usuario::listar(1, $id);
          
        }
    }

    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/cad.css">
    <title>Meu Perfil | ODISSEIA </title>
</head>
<style>
    ::-webkit-input-placeholder  { color: white; }

    textarea{
        color: white;
        padding: 10px;
        font-family: 'Hammersmith One', sans-serif;
    }

    body{
        color: white;
        font-family: 'Hammersmith One', sans-serif;
    }

    header{
        background-color: #74030e;
        font-family: 'Hammersmith One', sans-serif;
        opacity: 90%;
        padding: 2%;
    }

    a:hover{
        color: #BC5357;
    }

    input{
        background: none; 
        border: none;
        color: white;
        font-size: 16px;
    }

    .perfil{
        overflow-y: scroll;
        box-sizing: border-box;
        margin-left: 4%;
        max-width: 130%;
        max-height: 50em;
        padding: 3%;
        background: #74030e;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        position: static;
        /* opacity: 90%; */
        resize: none;
        margin-top: 4.5%;
        padding-bottom: 4%;
    }

    .perfil2{
        margin-top: -1%;
        box-sizing: border-box;
        overflow-y: scroll;
        padding: 3%;
        background: #74030e;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        margin-left: 2%;
        width: 33em;
        resize: none;
        height: 25em;
        position: static;
        /* opacity: 80%; */
    }

    .ver{
        margin-top: 32%;
        background-color: #74030e; 
        margin-left: -42%; 
        padding-left: 31em; 
        padding-right: 2em; 
        padding-bottom: 1em;
        padding-top: 1em;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        resize: none;
        border-radius: 10px;
    }
    td{
        padding: 1em 4em 1em;
        border-bottom: 4px dashed rgb(7, 52, 7);
    }
</style>

<body>
    <div class="stars">
    <div class="twinkling">
    <header style = "background-color: #BC5357;;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 65%">
            <ul>
                    <li><a href="principal.php"> ASTROFOTOS </a></li>
                    <li><a href="principalart.php"> ARTIGOS </a></li>
                    <li><a href="simu.php"> SIMULAÇÃO </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
        
    </header>

    <section id="perfil">
        <div class="perfil">
            <center>
            <img src="<?php echo $data['ficheiro'];?>" alt="" style="resize: none; width: 405px; height: 379.5px; border-radius: 500px">
            </center>
        </div>
        <table>
            <div class="perfil2" style = "background-color: #8C3001;">
            <div>
                <p class="titulo2" style="text-transform: uppercase;">Nome</p><br><br>
                <input hidden disabled name="nome" id="nome" type="text" required="true" placeholder="Insira o Nome" value="<?php echo $data['nome'];?>"></div>    
                <p style="color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['nome'];?></p>
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Login</p><br><br>
                <input hidden disabled name="login" id="login" type="text" required="true" placeholder="Insira o Login" value="<?php echo $data['login'];?>"></div>        
                <p style="color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['login'];?></p>
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Email</p><br><br>
                <input hidden disabled name="email" id="email" type="text" required="true" placeholder="Insira o E-mail" value="<?php echo $data['email'];?>"></div>         
                <p style="color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['email'];?></p>
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Senha</p><br><br>
                <input disabled onkeyup='confirmacao();' name="senha" id="senha" type="password" class="form-control" minlength="8" value="<?php echo $data['senha'];?>" placeholder="Insira a Senha"></div>
                <!-- <p style="color: white; font-family: 'Hammersmith One', sans-serif;"></p> -->
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Sobre</p><br><br>
                <textarea disabled name="sobre" id="sobre" rows="5" cols="30" style="resize: none; border: none;"><?php echo $data['sobre'];?></textarea></div>
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Região</p><br><br>
                <input hidden disabled class="sn" name="regiao" id="regiao" type="text" required="true" placeholder="Insira a Região" value="<?php echo $data['regiao'];?>"></div>
                <p style="color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['regiao'];?></p>
                <br>

            <div>
                <p class="titulo2" style="text-transform: uppercase;">Website</p><br><br>
                <a href="<?php echo $data['website'];?>"><input hidden disabled name="website" id="website" type="text" required="true" placeholder="Insira o Website" value="<?php echo $data['website'];?>">
                <i><u><p style="color: white; font-family: 'Hammersmith One', sans-serif;"><?php echo $data['website'];?></p></i></u>
            </a></div>
            <br><br>
            <br>
            <br>
            </div> 
                <div class="ver" style = "background-color: #a33e0b; margin-right: 1%">
                <center>
                    <a style="margin-top: 2.3em; margin-left: -31.5em; background: none; color: white; " class="bt" href='editarperfil.php?id=<?php echo $data['id'];?>&processo=editar'>
                    <img src="../imagens/edit.png" alt="" style="width: 2em; margin-left: 80%"></a>
                    <p style="margin-left: -28.4em; font-family: 'Hammersmith One', sans-serif;">EDITAR PERFIL</p>
                </center>
                </div>
        </table>

    </section>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <br>
    

    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
