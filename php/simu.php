<html>
    

    <head>


    <html lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" shortcut icon" href="../imagens/favicon.png " type="image/x-icon">   
    <link rel="stylesheet" href="../css/cad.css"/>
    <title>  Órbitas Newtonianas | ODISSEIA </title>

        <style>
        html, body, #viewport { 
            margin: 0; 
            background: #171717; 
            height: 93%; 
        } 
        .pjs-meta { 
            color: #fff; 
        } 
        canvas { 
            position: absolute; 
            top: 10%; 
            left: 0; 
            right: 0; 
            bottom: 0; 
        }

         
        a:hover{
        color: #74030e;
        }      
        label{
            color: #fff;
        }
        </style>
        <script src="http://wellcaffeinated.net/PhysicsJS/assets/scripts/vendor/raf.js"></script>
        <script src="http://wellcaffeinated.net/PhysicsJS/assets/scripts/vendor/physicsjs-current/physicsjs-full.min.js"></script>
        <script>
            if ( window.innerWidth === 0 ) { 
                window.innerWidth = parent.innerWidth; 
                window.innerHeight = parent.innerHeight; 
            }
            var require = { 
                baseUrl: "http://wellcaffeinated.net/PhysicsJS/assets/scripts/"
            };

           window.onload = (function(){

            document.getElementById('massa').addEventListener("mouseout",function(){
                document.getElementById('numero').innerHTML = this.value;
                
            }); 
            document.getElementById('raio').addEventListener("mouseout",function(){
                document.getElementById('numero1').innerHTML = this.value;
                
            });    
            document.getElementById('massa2').addEventListener("mouseout",function(){
                document.getElementById('numero2').innerHTML = this.value;
                
            });             
            document.getElementById('raio2').addEventListener("mouseout",function(){
                document.getElementById('numero3').innerHTML = this.value;
                
            }); 
           });

        </script>
        <script src="http://wellcaffeinated.net/PhysicsJS/assets/scripts/vendor/require.js"></script>
    </head>
<body>
<header style = "background-color: #BC5357;;"> 
    <br>
    <p class="odi" style = "font-size: 200%; margin-top: -2%; height: 8px;"><a href="principal.php">O D I S S E I A</a></p>
        <div class="menu" style = "padding-top: -1%; padding-left: 71%">
            <ul>
                    <li><a href="simu.php">REINICIAR SIMULAÇÃO |</a></li>
                    <li><a href="../controle/processaI.php?processo=login">ENCERRAR SESSÃO</a></li>
                </ul> 
        </div>
        
    </header>
    <br>
    <div>
        <label for="circulo1"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: red; ">PLANETA 1 </label><br>
        <label for="massa"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: white; border-radius: 5px">MASSA 1: 
       <input type="text" id="massa"style = "border-radius: 2px; border: none; margin-left: 0.4%; font-family: 'Hammersmith One'; color: black;"></label><br>
        <label for="raio"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: white;" >RAIO 1: 
        <input type="text" id="raio" style = "border-radius: 2px; border: none; margin-left: 1.55%; font-family: 'Hammersmith One'; color: black; "></label>
            <br><br><br>
        <label for="circulo1"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: red; ">PLANETA 2 </label><br>
        <label for="massa"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: white;">MASSA 2: 
       <input type="text" id="massa2" style = "border-radius: 2px; border: none; margin-left: 0.4%; font-family: 'Hammersmith One'; color: black;"></label><br>
        <label for="raio"  style = "margin-left: 1%; font-family: 'Hammersmith One'; color: white;" >RAIO 2: 
        <input type="text  " id="raio2" style = "border-radius: 2px; border: none; margin-left: 1.55%; font-family: 'Hammersmith One'; color: black;"></div>

            <br>
        <input class = "bt" type="submit" name="acao" id="acao" style = "margin-left: 1%; font-family: 'Hammersmith One'; color: white; background-color: #74030e; border: none" value="INICIAR SIMULAÇÃO">
    </div>
    <br>
    <div id="viewport">
        <canvas class=" pjs-layer-main" width="0" height="736" style="position: absolute; z-index: 1;"></canvas>
    </div>


<script src="../js/simu.js"></script>
<script src="../js/script.js"></script>
</body>
</html>