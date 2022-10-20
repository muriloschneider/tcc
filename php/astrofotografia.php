<!DOCTYPE html>
<?php

    include_once ("../classes/autoload.php");
    include_once "../controle/processaII.php";
    require_once "../conf/Conexao.php";


    
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 1; 
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Astrofotografia | ODISSEIA</title>
</head>

<body>
    <content>
        <div class="container-fluid">
        <table class="table table-striped">
                <tr><td><b>ID</b></td>
                    <td><b>Nome da Astrofotografia</b></td>
                    <td><b>Editar</b></td>
                    <td><b>Deletar</b></td>
                </tr> 

                <form method="post" action="../controle/processaII.php">
                    <div class="form-group col-lg-3">
                        <h3>Consultar</h3>
                        <br>
                        <input type="text" name="procurar" id="procurar" size="50" class="form-control" placeholder="Insira a Consulta" value="<?php echo $procurar;?>"> <br>
                        <button name="processo" id="processo" type="submit"  class="btn btn-dark">Procurar</button>
                        <br><br>
                        <form method="post" action="../controle/processaII.php">
                    </div>
                    <br><br>
                </form>

            <?php
                $lista = Astrofotografia::listar($tipo, $procurar); 
                foreach ($lista as $linha) { 
            ?>
                <tr><td><?php echo $linha['id'];?></td>
                    <td><?php echo $linha['nome_astro'];?></td>
                    <td><?php echo $linha['equipamento'];?></td>
                    <td><?php echo $linha['idusuario'];?></td>
                
                    <td><a href='cadastrofoto.php?id=<?php echo $linha['id'];?>&processo=editar'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
<path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
</svg></a></td>
                    <td><a href="processaII.php?id=<?php echo $linha['id'];?>&processo=excluir">
<svg xmlns="http://www.w3.org/2000/svg" widht="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
</svg>
</a></td>
                </tr>
            <?php 
                }
            ?> 
        </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </content>
</body>
</html>
