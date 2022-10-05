<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaI.php";
    
    session_start();
    $data = Usuario::dados($_SESSION['id'])[0];

    
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
    <title>Meu Perfil | ODISSEIA </title>
</head>

<body>


    <div class="container-fluid">
        <form method="post" action="../controle/processaI.php">
            <center>
            
            <input readonly class="form-control"  style="max-width:20%" type="hidden" name="id" id="id" value="<?php echo $data['id'];?>">
            <br>
            Nome:<input  disabled class="form-control"  style="max-width:20%" name="nome" id="nome" type="text" required="true" placeholder="Insira o Nome" value="<?php echo $data['nome'];?>"><br>         
            <br>
            Login:<input disabled class="form-control"  style="max-width:20%" name="login" id="login" type="text" required="true" placeholder="Insira o Login" value="<?php echo $data['login'];?>"><br>         
            <br>
            E-mail:<input disabled class="form-control"  style="max-width:20%" name="email" id="email" type="text" required="true" placeholder="Insira o E-mail" value="<?php echo $data['email'];?>"><br>         
            <br>
            Senha:<input disabled onkeyup='confirmacao();' name="senha" id="senha" type="password" class="form-control" minlength="8" value="<?php echo $data['senha'];?>" placeholder="Insira a Senha"><br>         
            <br>
     
            Sobre:
            <br>
            <textarea disabled name = "sobre" id = "sobre"><?php echo $data['sobre'];?></textarea><br>         
            <br>
            Região:<input disabled class="form-control"  style="max-width:20%" name="regiao" id="regiao" type="text" required="true" placeholder="Insira a Região" value="<?php echo $data['regiao'];?>"><br>         
            <br>
            Website:<a href="<?php echo $data['website'];?>"><input disabled class="form-control"  style="max-width:20%" name="website" id="website" type="text" required="true" placeholder="Insira o Website" value="<?php echo $data['website'];?>"><br>         
            <br>
</a>
          <a href='editarperfil.php?id=<?php echo $data['id'];?>&processo=editar'>   Editar Perfil <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
<path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
</svg></a>
           </form>  
        <hr>
</center>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
