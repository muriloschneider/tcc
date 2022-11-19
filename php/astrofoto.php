<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    require_once "../conf/Conexao.php";
    include_once "../controle/processaII.php";
    
    $data = Astrofotografia::dados($_GET['idastro'])[0];
    $idastro = isset($_GET['idastro']) ? $_GET['idastro'] : 0;
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
    $titulo =  $data['nome_astro'];

    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="../css/cad.css"/>
    <title> <?php echo $titulo ?> | ODISSEIA </title>
</head>


<body>

    <div class="stars">
    <div class="twinkling">  
    <header style = "background-color: #BC5357;;"> 
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
        <p class="titulo1" style="text-transform: uppercase; font-size: 220%; margin-top: 2.3%; "><?php echo $data['nome_astro'];?></p>
        <div class="color1" style="margin-top: 0.1%; background: #74030e; padding-top: 1%">
    
        <center>
            <div><img src="<?php echo $data['ficheiro'];?>" alt="" style="object-fit: cover; width: 530px; height: 364.45px; border-radius: 5px; margin-left: 0%; margin-top: 2.5%"></div>
            <br>
            <br>
            <br>
 
        </center>

        </div>

        <div class="color2" style="overflow-y: scroll; border-radius: 5px; margin-top: -39%; background: #8C3001;">
                                                                        
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
                <a  href='perfil.php?id=<?php echo $linha['id'];?>' style="font-size: 130%;  color: white; border: none; background-color: #8C3001; font-family: 'Hammersmith One', sans-serif; maxx; resize: none;"><?php echo $linha['login'];?></a>
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
