
<!DOCTYPE html>
<?php
    include_once "../controle/processaI.php";
    require_once "../classes/autoload.php";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == 'editar'){
       $user = new Usuario($id, "", "", "", "", "", "", "", "");
       $lista = $user->listar(1, $id);
       $user->setNome($lista[0]['nome']);
       $user->setEmail($lista[0]['email']);
       $user->setLogin($lista[0]['login']);
       $user->setSenha($lista[0]['senha']);

}
    // var_dump($dados);
?>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel=" shortcut icon" href="../imagens/favicon.png" type="image/x-icon">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro | ODISSEIA</title>

<link rel="stylesheet" href="../css/csstcc1.css"/>

    </head>
    <body>

    <div class="stars">
    <div class="twinkling"> 
    <div class="clouds"></div>
            
          
    <div class="caixaI">
<div class="caixaII">
<div class="caixaIII">
<div class="caixaIV">

<center><p class="titulo"> CADASTRO </p></center>


<form method="post" action="../controle/processaI.php" >
<div class="color">

                <div class="icon">
                <img class="icon" src="../imagens/user1.png">
                <input name="nome" id="nome" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getNome(); ?>" placeholder="Nome">
                 </div>


                <div class="icon">
                <img class="icon" src="../imagens/user2.png">
                <input name="login" id="login" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getLogin(); ?>" placeholder="Login">
                </div>

                <div class="icon">
                <img class="icon" src="../imagens/email.png">         
                <input name="email" id="email" type="text" required="true" class="form-control" value="<?php if ($processo == "editar") echo $user->getemail(); ?>" placeholder="E-mail">
                </div>

                <div class="icon">
                <img class="icon" src="../imagens/senha.png">      
                <input onkeyup='confirmacao();' name="senha" id="senha" type="password" required="true" class="form-control" minlength="8" value="<?php if ($processo == "editar") echo $user->getSenha(); ?>" placeholder="Senha"><br>         
                </div>

                <div class="icon">
                <img class="icon" src="../imagens/senha.png">      
                <input onkeyup='confirmacao();' name="senha2" id="senha2" type="password" required="true" class="form-control" minlength="8" value="<?php if ($processo == "editar") echo $user->getSenha(); ?>" placeholder="Confirmar Senha"><br>         
                </div>

                <div class="check">
                <input type="checkbox" required="true"> <p class="check" style="font-size: 60%;">Eu concordo com os termos do ODISSEIA.</p><br>
                <input type="checkbox" required="true"> <p class="check" style="font-size: 60%;">Eu aceito receber notificações do ODISSEIA no meu e-mail.</p>
                </div>
<center>
                    <button name="processo" value="salvar" id="processo" type="submit" disa>Cadastrar</button>
</center>
</form>


    
</table>

</div>


<p class="descri">Já tem uma conta?<br> Faça o login <a href="login.php">aqui</a></p>



</div>
</div>

<script src="../js/main.js"></script>
</body>

</html>