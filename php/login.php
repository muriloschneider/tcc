<?php 
    session_start();
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once('../classes/autoload.php');
    $login = isset($_POST["login"]) ? $_POST["login"] : "";     
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : ""; 
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel=" shortcut icon" href="../imagens/favicon.png" type="image/x-icon">   
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | ODISSEIA</title>

<link rel="stylesheet" href="../css/csstcc.css"/>

    </head>
    <body>

    <div class="stars">
    <div class="twinkling"> 
    <div class="clouds"></div>
            
<div class="caixaI">
<div class="caixaII">
<div class="caixaIII">


<div class="caixaIV">



<center><p class="titulo"> LOGIN </p></center>


<form method="post" action="../controle/processaI.php" >
<div class="color">
<br>    
    
                <div class="icon">
                <img class="icon" src="../imagens/user2.png">
                <input type="text" name="login" id="login" class="form-control" placeholder="Login" required = "true"><br>                </div>


<br>
                <div class="icon">
                <img class="icon" src="../imagens/senha.png">      
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required = "true"><br>
                </div>

<br>
<center>
                    <button name="processo" value="login" id="processo" type="submit">Entrar</button>
</center>
</form>

</table>
</div>


<p class="descri">Não tem uma conta ainda?<br> Cadastre-se <a href="cadastro.php">aqui</a></p>



</div>
</div>


<footer>
    <div class="footer">
    
        <div class="redesocial">
        <img class="rede" src="../imagens/instagram.png"><p class="redesocial">in/astrodisseia</p>
        </div>

        <div class="redesocial">
        <img class="rede" src="../imagens/facebook.png"><p class="redesocial">fb/astrodisseia</p>
        </div>

        <div class="redesocial">
        <img class="rede" src="../imagens/telegram.png"><p class="redesocial">t.me/astrodisseia</p>
        </div>
        
        
    </div>


     <div class="footer1">
    <div class="footer3">
    <div class="footer4">
    <div class="footer5">
    <img src="../imagens/logo1.png" class="logo">
    <p class="odi">ODISSEIA</p>
    </div>
    </div>
    </div>
    </div>
</footer>
<?php
             error_reporting(1);
             if($_GET['processo'] == 'login'){
             $user = new Usuario("","","","", "", "", "", "");
             if ($user->efetuarLogin($login, $senha) == true){
                 echo "Bem-vindo!";
                 header("location:../php/principal.php");
             } else {
                 echo "<br><br>Erro ao entrar";
             }
         } 
        ?>
</body>

</html>