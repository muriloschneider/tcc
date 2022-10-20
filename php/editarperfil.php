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
    if ($processo == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id > 0){
            $user = new Usuario("","", "", "", "", "", "", "");
            $dados = $user->listar(1, $id);
        }
    }
    ?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Editar Perfil | ODISSEIA </title>
</head>

<body>

       <div class="stars">
    <div class="twinkling"> 
    <div class="clouds"></div>
            
<div class="caixaI">
<div class="caixaII">
<div class="caixaIII">


<div class="caixaV">


        <p class="titulo1"> EDITAR PERFIL </p>


   
    <img src="../imagens/logo1.png" class="logo" >

        <form method="post" action="../controle/processaI.php">
            <div class="color1">
            
            <p class="titulo2">CONFIGURAÇÕES</p><img src="../imagens/config.png" style="width:5%;"><br><br>

            <input class="input" readonly type="hidden" name="id" id="id" value="<?php if($processo == "editar"){echo $dados[0]['id'];}?>"><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/user1.png" class="icon1" style="float: left;"><p class="des">Nome</p>
            <input class="inputnome" name="nome" id="nome" type="text" required="true" placeholder="Insira o Nome" value="<?php if ($processo == "editar"){echo $dados[0]['nome'];}?>">
            </div><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/user2.png" class="icon1" style="float: left;"><p class="des">Login</p>
            <input class="inputlogin" name="login" id="login" type="text" required="true" placeholder="Insira o Login" value="<?php if ($processo == "editar"){echo $dados[0]['login'];}?>">
            </div><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/email.png" class="icon1" style="float: left;"><p class="des">E-mail</p>
            <input class="inputemail" name="email" id="email" type="text" required="true" placeholder="Insira o E-mail" value="<?php if ($processo == "editar"){echo $dados[0]['email'];}?>">
            </div><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/senha.png" class="icon1" style="float: left;"><p class="des">Senha</p>
            <input class="inputsenha" onkeyup='confirmacao();' name="senha" id="senha" type="password"  minlength="8" value="<?php if ($processo == "editar"){echo $dados[0]['senha'];}?>" placeholder="Insira a Senha">
            </div><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/senha.png" class="icon1" style="float: left;"><p class="des">Confirmar Senha</p>
            <input class="inputconf" onkeyup='confirmacao();' name="senha2" id="senha2" type="password" required="true"  minlength="8" value="<?php if ($processo == "editar") echo $user->getSenha();?>" placeholder="Confirmar Senha">            </div><img src="../imagens/edit.png" class="edit">


            <div class="red">
            <img src="../imagens/info.png" class="icon1" style="float: left;"><p class="des">Sobre</p>
            <left><textarea style="color:white;" name = "sobre" id = "sobre" placeholder="Conte sobre você!"><?php if ($processo == "editar"){echo $dados[0]['sobre'];}?></textarea></left>
            </div><img src="../imagens/edit.png" class="edit">

            <div class="red">
            <img src="../imagens/local.png" class="icon1" style="float: left;"><p class="des">Região</p>
            <input class="inputreg" name="regiao" id="regiao" type="text" required="true" placeholder="Insira a Região" value="<?php if ($processo == "editar"){echo $dados[0]['regiao'];}?>">       
            </div><img src="../imagens/edit.png" class="edit">


            <div class="red">
            <img src="../imagens/web.png" class="icon1" style="float: left;"><p class="des">Website</p>
             <input class="inputweb" name="website" id="website" type="text" required="true" placeholder="Insira o Website" value="<?php if ($processo == "editar"){echo $dados[0]['website'];}?>">
            </div>



            <button class="voltar"><a class="linkvol" href="meuperfil.php">Voltar</a></button>
            <button name="processo" value="salvar" id="processo" type="submit">Salvar Alterações</button> 
            <button name="processo" value="excluir" id="processo" type="submit" style="float:right; margin-right: 1%;">Deletar sua Conta</button>     
            </div>  


            <div class="ajax">
                <img class="repre" src="../imagens/images.jpg">
                <button class="foto" name="processo" value="salvar" id="processo" type="submit">Alterar foto do Perfil</button> 
            </div>

           </form>  
        
</center>
    </div>


    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</div>
</div>
</div>
</div>
</div>
</div>
</div>



</body>
</html>
