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
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Meu Perfil | ODISSEIA </title>
</head>

<body>

     <div class="stars">
    <div class="twinkling"> 
    <div class="clouds"></div>
            
<div class="caixaI">
<div class="caixaII">
<div class="caixaIII">


<div class="caixaV">

    <div class="menu">
        <ul>
            <li><a href="">Página Principal</a></li>
            <li><a href="">Astrofotos</a></li>
            <li><a href="">Artigos</a></li>
            <li><a href="">Simulações</a></li>
            <li><a href="">Editar Perfil</a></li>
            <li><a href="">Encerrar Sessão</a></li>
        </ul>
    </div>

  
        <form method="post" action="../controle/processaI.php">
            <center>
            
            <input readonly type="hidden" name="id" id="id" value="<?php echo $data['id'];?>">
            
            Nome:<input  disabled name="nome" id="nome" type="text" required="true" placeholder="Insira o Nome" value="<?php echo $data['nome'];?>">         
            
            Login:<input disabled name="login" id="login" type="text" required="true" placeholder="Insira o Login" value="<?php echo $data['login'];?>">         
            
            E-mail:<input disabled name="email" id="email" type="text" required="true" placeholder="Insira o E-mail" value="<?php echo $data['email'];?>">         
            
            Senha:<input disabled onkeyup='confirmacao();' name="senha" id="senha" type="password" class="form-control" minlength="8" value="<?php echo $data['senha'];?>" placeholder="Insira a Senha">         
            
     
            Sobre:
            
            <textarea disabled name = "sobre" id = "sobre"><?php echo $data['sobre'];?></textarea>         
            
            Região:<input disabled name="regiao" id="regiao" type="text" required="true" placeholder="Insira a Região" value="<?php echo $data['regiao'];?>">         
            
            Website:<a href="<?php echo $data['website'];?>"><input disabled name="website" id="website" type="text" required="true" placeholder="Insira o Website" value="<?php echo $data['website'];?>">         
            
</a>
          <a href='editarperfil.php?id=<?php echo $data['id'];?>&processo=editar'>   Editar Perfil </a>

           </form>  
       
</center>
    </div>
    </div>
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
