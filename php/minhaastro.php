<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaII.php";
    
    $data = Astrofotografia::dados($_GET['idastro'])[0];
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
    $titulo =  $data['nome_astro'];

    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" shortcut icon" href="../imagens/favicon.png " type="image/x-icon">   
    <link rel="stylesheet" href="../css/cad.css"/>
    <title> <?php echo $titulo ?> | ODISSEIA </title>
</head>
<body>

    <div class="stars">
    <div class="twinkling">  
    <header style = "background-color: #BC5357;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="inicio.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 59%">
            <ul>
                    <li><a href="principal.php">ASTROFOTOS </a></li>
                    <li><a href="criarastro.php">NOVA PUBLICAÇÃO </a></li>
                    <li><a href="meuperfil.php">MEU PERFIL </a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
        
    </header>
    <section>
    <div><input disabled name="idastro" id="idastro" type="hidden" required="true" placeholder="Insira o idastro" value="<?php echo $data['idastro'];?>"></div>        

        <form method="post" action="../controle/processaII.php">
        <p class="titulo1" style="text-transform: uppercase;font-size: 220%; margin-top: 2.3%; "><?php echo $data['nome_astro'];?></p>
        <div class="color1" style="margin-top: 0.1%; background: #74030e; padding-top: 1%">
    
        <center>
            <div><img src="<?php echo $data['ficheiro'];?>" alt="" style="object-fit: cover; width: 530px; height: 364.45px; border-radius: 5px; margin-left: 0%; margin-top: 2.5%"></div>
            <br>
            <a class="bt" href='editarastro.php?idastro=<?php echo $data['idastro'];?>&processo=editar' style="margin-left: -5%; margin-right: 46%; font-family: 'Hammersmith One', sans-serif; maxx; color: white; background-color: #74030e;">  
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
 <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
 </svg> EDITAR </a>
 
<a class="bt2" onclick="return confirm('Confirmar exclusão')" href='../controle/processaII.php?idastro=<?php echo $data['idastro'];?>&processo=excluir' style="margin-left: 15%; font-family: 'Hammersmith One', sans-serif; maxx; color: white; background-color: #74030e;">  
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg>  EXCLUIR </a>
        </center>

        </div>

        <div class="color2" style="overflow-y: scroll; border-radius: 5px; margin-top: -38.9%; background: #8C3001;">
                                                                        
            <div>
                <p style="text-transform: uppercase; font-size: 150%;" class="titulo2">Equipamento</p><br><br>
                <textarea disabled style="font-size: 90%; color: white; height: 100%; width: 100%;  border: none; background-color: #8C3001; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"><?php echo $data['equipamento'];?></textarea>
            </div>         
        </div>
        
        <div class="color3" style="overflow-y: scroll; background: #8C3001; margin-top: 0.5%; border-radius: 5px;">
            <div>
            <p style="text-transform: uppercase; font-size: 150%" class="titulo2">Detalhes de Captura</p><br><br>
                <textarea disabled style="font-size: 90%; color: white; height: 100%; width: 100%; border: none; background-color: #8C3001; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"><?php echo $data['detalhes'];?></textarea>
            </div>
        </div>

        <div class="color3" style="background: #8C3001; margin-top: 0.5%; border-radius: 5px;">
        <p style="text-transform: uppercase; font-size: 140%;" class="titulo2">Autor</p><br><br>
            <div>
               
                <?php 
                $pdo = Database::iniciaConexao();
                $consulta = $pdo->query("SELECT * FROM usuario WHERE id = $idusuario");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
    ?>
    
                <input hidden disabled name="idusuario" id="idusuario" type="text" class="form-control" value="<?php echo $linha['id'];?>"></div>
                <br>
                <img src="<?php echo $linha['ficheiro'];?>" width="60" height="60" style="border-radius: 50px; margin-top: -2%; object-fit: cover;">
                <div style = "margin-top: -10%; margin-left: 20%; ">
                <a  href='meuperfil.php?id=<?php echo $linha['id'];?>' style="font-size: 120%;  color: white; border: none; background-color: #8C3001; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"><?php echo $linha['login'];?></a>
                </div>
                <?php } ?>

            </div>
            </div>
            </div>
        </form>
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
