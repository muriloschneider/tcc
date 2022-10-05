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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar Perfil | ODISSEIA </title>
</head>

<body>


    <div class="container-fluid">
        <form method="post" action="../controle/processaI.php">
            <center>
            
            <input readonly class="form-control"  style="max-width:20%" type="hidden" name="id" id="id" value="<?php if($processo == "editar"){echo $dados[0]['id'];}?>">
            <br>
            Nome:<input class="form-control"  style="max-width:20%" name="nome" id="nome" type="text" required="true" placeholder="Insira o Nome" value="<?php if ($processo == "editar"){echo $dados[0]['nome'];}?>"><br>         
            <br>
            Login:<input class="form-control"  style="max-width:20%" name="login" id="login" type="text" required="true" placeholder="Insira o Login" value="<?php if ($processo == "editar"){echo $dados[0]['login'];}?>"><br>         
            <br>
            E-mail:<input class="form-control"  style="max-width:20%" name="email" id="email" type="text" required="true" placeholder="Insira o E-mail" value="<?php if ($processo == "editar"){echo $dados[0]['email'];}?>"><br>         
            <br>
            Senha:<input onkeyup='confirmacao();' name="senha" id="senha" type="password" class="form-control" minlength="8" value="<?php if ($processo == "editar"){echo $dados[0]['senha'];}?>" placeholder="Insira a Senha"><br>         
            <br>
            Confirmar Senha:<input onkeyup='confirmacao();' name="senha2" id="senha2" type="password" required="true" class="form-control" minlength="8" value="<?php if ($processo == "editar") echo $user->getSenha();?>" placeholder="Confirmar Senha"><br>         
            <br>
            Sobre:
            <br>
            <textarea name = "sobre" id = "sobre"><?php if ($processo == "editar"){echo $dados[0]['sobre'];}?></textarea><br>         
            <br>
            Região:<input class="form-control"  style="max-width:20%" name="regiao" id="regiao" type="text" required="true" placeholder="Insira a Região" value="<?php if ($processo == "editar"){echo $dados[0]['regiao'];}?>"><br>         
            <br>
            Website:<input class="form-control"  style="max-width:20%" name="website" id="website" type="text" required="true" placeholder="Insira o Website" value="<?php if ($processo == "editar"){echo $dados[0]['website'];}?>"><br>         
            <br>


            <button class="btn btn-dark" name="processo" value="salvar" id="processo" type="submit">Salvar</button>     
           </form>  
        <hr>
</center>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
