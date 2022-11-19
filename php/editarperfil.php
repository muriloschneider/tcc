    <!DOCTYPE html>
    <?php
        include_once ("../classes/autoload.php");
        require_once "../conf/Conexao.php";
        include_once "../controle/processaI.php";
        
        $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $login = isset($_POST['login']) ? $_POST['login'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $sobre = isset($_POST['sobre']) ? $_POST['sobre'] : "";
        $regiao = isset($_POST['regiao']) ? $_POST['regiao'] : "";
        $website = isset($_POST['website']) ? $_POST['website'] : "";
        $ficheiro = isset($_POST['ficheiro']) ? $_POST['ficheiro'] : "";

        if ($processo == 'editar'){
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            if ($id > 0){
                $user = new Usuario("","", "", "", "", "", "", "", "");
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
        <link rel="stylesheet" href="../css/cad.css"/>
        <title>Editar Perfil | ODISSEIA </title>
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
            background: #BC5357; 
            border: black;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }


        input[type=file]{
            background: #74030e; 
            border: black;
            color: white;
            font-size: 16px;
            border-radius: 5px;
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
            border-radius: 5px;
            position: static;
            /* opacity: 90%; */
            resize: none;
            margin-top: 5%;
            padding-bottom: 7%;
            padding-top: 1.5%;
        }

        .perfil2{
            margin-top: 1.5%;
            box-sizing: border-box;
            overflow-y: scroll;
            padding: 3%;
            background: #74030e;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            margin-left: 2%;
            width: 33em;
            resize: none;
            height: 28em;
            position: static;
            /* opacity: 80%; */
        }

        .ver{
            margin-top: 32%;
            background-color: #74030e; 
            padding-left: 18.9em; 
            margin-left: -33em; 
            padding-bottom: 1em;
            padding-top: 1em;
            margin-bottom: -4.5em;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            resize: none;
            border-radius: 5px;
        }
        td{
            padding: 1em 4em 1em;
            border-bottom: 4px dashed rgb(7, 52, 7);
        }
        
        .bt{    
        display: inline-block;
        padding: 2%;
        padding-left:1%;
        border-radius: 10px;
        margin-right: 45%;
        background-color: #74030e;
        color: white;
        }

    </style>
    <body>
        <div class="stars">
        <div class="twinkling">
        <header style = "background-color: #BC5357;;"> 
        <br>
        <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
            <div class="menu" style = "padding-top: -1%; padding-left: 80%">
                <ul>
                        <li><a href="meuperfil.php"> MEU PERFIL </a></li>
                        <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                    </ul> 
            </div>
        </header>
        <form method="post" action="../controle/processaI.php"  enctype="multipart/form-data">
        <section id="perfil">
        <div class="perfil">
                <center>           
                <img src="../imagens/person-gear.svg" alt="" style="resize: none; width: 405px; height: 379.5px; border-radius: 500px">
                </center>
        </div>
            <table>
                <input hidden name="id" id="id" type="text" style="color: white; font-family: 'Hammersmith One', sans-serif;" placeholder="Insira o id" value="<?php if ($processo == "editar"){echo $dados[0]['id'];}?>"></div>    

                <div class="perfil2" style = "background-color: #8C3001;">
                <p class="titulo2" style="text-transform: uppercase; font-size: 200%">EDITAR PERFIL</p><img src="../imagens/config.png" style="width:4.5%; margin-top: 2%"><br>
                <br>
                <br>
                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Nome</p><br><br>
                    <input name="nome" id="nome" type="text" style="color: white; font-family: 'Hammersmith One', sans-serif;" placeholder="Insira o Nome" value="<?php if ($processo == "editar"){echo $dados[0]['nome'];}?>"></div>    
                    <br>
                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Login</p><br><br>
                    <input name="login" id="login" type="text" style="color: white; font-family: 'Hammersmith One', sans-serif;" placeholder="Insira o Login" value="<?php if ($processo == "editar"){echo $dados[0]['login'];}?>"></div>        
                    <br>

                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Email</p><br><br>
                    <input name="email" id="email" type="text" style="color: white; font-family: 'Hammersmith One', sans-serif;" placeholder="Insira o E-mail" value="<?php if ($processo == "editar"){echo $dados[0]['email'];}?>"></div>         
                    <br>

                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Senha</p><br><br>
                    <input  onkeyup='confirmacao();'  style="color: white; font-family: 'Hammersmith One', sans-serif;" name="senha" id="senha" type="password" class="form-control" minlength="8"  required="true" value="<?php if ($processo == "editar"){echo $dados[0]['senha'];}?>" placeholder="Insira a Senha"></div>
                    <br>
                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Confirmar Senha</p><br><br>
                    <input  onkeyup='confirmacao();'  style="color: white; font-family: 'Hammersmith One', sans-serif;" name="senha2" id="senha2" type="password" class="form-control" minlength="8"  required="true" value="<?php if ($processo == "editar") echo $user->getSenha();?>"></div>
                    <br>

                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Sobre</p><br><br>
                    <textarea name="sobre"  style="color: white; font-family: 'Hammersmith One', sans-serif; resize: none; background: #74030e;" id="sobre" rows="5" cols="30" style="resize: none; border: none;"><?php if ($processo == "editar"){echo $dados[0]['sobre'];}?></textarea></div>
                    <br>

                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Região</p><br><br>
                    <input class="sn"  style="color: white; font-family: 'Hammersmith One', sans-serif;" name="regiao" id="regiao" type="text"  placeholder="Insira a Região" value="<?php if ($processo == "editar"){echo $dados[0]['regiao'];}?>"></div>
                    <br>

                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Website</p><br><br>
                    <input style="color: white; font-family: 'Hammersmith One', sans-serif;" name="website" id="website" type="text"  placeholder="Insira o Website" value="<?php if ($processo == "editar"){echo $dados[0]['website'];}?>"></div>
                    <br>
                <div>
                    <p class="titulo2" style="text-transform: uppercase;">Foto de Perfil</p><br><br>
                    <input  style="color: white; font-family: 'Hammersmith One', sans-serif;" name="ficheiro" id="ficheiro" type="file" placeholder="Insira o ficheiro" value="<?php if ($processo == "editar"){echo $dados[0]['ficheiro'];}?>"></div>
                    <br>   
                <br>
                </div> 
                    <div class="ver" style = "background-color: #a33e0b;">
                    <center>
                    <button style="margin-left: -290%" name="processo" value="salvar" id="processo" type="submit" class = "bt">SALVAR</button> 
                    <button style="margin-left: -40%;" name="processo" value="excluir" id="processo" type="submit" class = "bt">DELETAR</button>     
                    </form>
                    <button  style="margin-right: -150%" class = "bt"><a href="meuperfil.php">CANCELAR</a></button>
                </center>
            </table>
            </div>
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
