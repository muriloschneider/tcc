<!DOCTYPE html>
<?php
    include_once "../controle/processaI.php";
    require_once "../classes/autoload.php";

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    
    ?>

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel=" shortcut icon" href="../imagens/favicon.png" type="image/x-icon">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perfil | ODISSEIA</title>

<link rel="stylesheet" href="../css/perfil.css"/>

</head>

<div class="quadradoum">
<div class="quadradodois">
<div class="quadradotres">
    <div class="quadradoesquerda">
    </div> 
    <div class="quadradosuperior">   
    </div> 
    <div class="quadradoinferior">   
    </div>
</div>
</div>
</div>

<?php

$consulta = usuario::listar($tipo, $procurar); // Método com "static"
//var_dump($consulta);
foreach($consulta as $linha){
?>

<tr>
    <td><?php echo $linha['nome'];?></td><br>
    <td><?php echo $linha['sobre'];?></td> <br>
    <td><?php echo $linha['regiao'];?></td> <br>
    <td><?php echo $linha['website'];?></td> 

</tr>

<?php } ?>
</html>