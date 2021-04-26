<!DOCTYPE html>
<html>
    <head>
        <title>Powerfull Coffee</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/> 
        <script language="JavaScript">
            function imagem ()	{
		var img1 = document.getElementById('img1');
		var img2 = document.getElementById('img8');
		img1.style.display="block";
		img2.style.display="";
		setTimeout("imagem2();", 2000);/*CHAMANDO A FUNÇÃO E QUANTOS SEGUNDOS PARA A IMAGEM PASSAR*/
            }
            function imagem2 ()	{
		var img1 = document.getElementById('img2');
		var img2 = document.getElementById('img1');
		img1.style.display="block";
		img2.style.display="";
		setTimeout("imagem3();", 2000);
            }					
            function imagem3 ()	{
                var img1 = document.getElementById('img3');
                var img2 = document.getElementById('img2');
                img1.style.display="block";
                img2.style.display="";
                setTimeout("imagem4();", 2000);
            }
            function imagem4 ()	{
                var img1 = document.getElementById('img4');
                var img2 = document.getElementById('img3');
                img1.style.display="block";
                img2.style.display="";
                setTimeout("imagem5();", 2000);
            }
            function imagem5 ()	{
		var img1 = document.getElementById('img5');
		var img2 = document.getElementById('img4');
		img1.style.display="block";
		img2.style.display="";
		setTimeout("imagem6();", 2000);
            }
            function imagem6 ()	{
		var img1 = document.getElementById('img6');
		var img2 = document.getElementById('img5');
		img1.style.display="block";
		img2.style.display="";
		setTimeout("imagem7();", 2000);
            }
            function imagem7 ()	{
		var img1 = document.getElementById('img7');
		var img2 = document.getElementById('img6');
		img1.style.display="block";
		img2.style.display="";
                setTimeout("imagem8();", 2000);
            }
            function imagem8 ()	{
		var img1 = document.getElementById('img8');
		var img2 = document.getElementById('img7');
		img1.style.display="block";
		img2.style.display="";
		setTimeout("imagem();", 2000);
            }
        </script>
    </head>
    <body onload="imagem()">        
        <?php
            //Verificar se a sessão foi aberta //se login foi realizado com sucesso
            session_start();
            //criado no momento que a pessoa fez o login
            if(!isset($_SESSION['id_usuario'])){
                header("location: index.php");
                //exit para não executar nada que esteja além dessa linha
                exit;
            }
        ?>
        <!--box maior em que se encaixa os demais-->
        <div id="boxdiv1">      
            <!--imagem letra powerfull coffee-->
            <div id="boxlogo11">
                    <img class="boximglogo11" src="imagens/letra_powerfullcoffee.png" alt="Powerfull Coffee" border="0">
            </div>
            <!--box do menu-->
            <div id="boxmenu">
                <ul class="ul">
                    <li class="li"><a class="active" href="paginaInicial.php">Powerfull Coffee</a></li>	    
                    <li class="li"><a href="menuCoffee.php">Coffee</a></li>
                    <li class="li"><a href="menuTea.php">Tea</a></li>
                    <li class="li"><a href="menuChocolate.php">Chocolate</a></li>
                    <li class="li"><a href="menuSweets.php">Sweets</a></li>
                    <li class="li"><a href="menuSavory.php">Savory</a></li>
                    <li class="li"><a href="adicionarProduto.php"></a>...</li>
                </ul>	
            </div>
            <!--cx que encaixa a imagem letra-->
            <div id="boxlogo1"> 
                <img src="imagens/letra_powerfullcoffee.png" alt="Menu" border="0">
            </div>
                <img id ='boximgx'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx2'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx3'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx4'src='imagens/img_xicara.png' alt='imagem'>
                <p class="botaosair">
                    <a href="sair.php">Exit (x)</a>
                </p>
                <!--botão do carrinho-->
                <p class="botaocarrinho">
                    <a href="carrinho.php">Go to Cart</a>
                </p>
            <!--em que estou encaixando o corpo da página-->
            <div id="boximg1-1">    
                <!--imagens slide show-->	
		<div id="imagem">
                    <!--DANDO IDENTIDADE PARA CADA IMAGEM QUE IREI UTILIZAR-->
                    <img src="imagens/img_x1.jpg" id="img1" />
                    <img src="imagens/img_x2.jpg" id="img2" />
                    <img src="imagens/img_x3.jpg" id="img3" />
                    <img src="imagens/img_x4.jpg" id="img4" />
                    <img src="imagens/img_x5.jpeg" id="img5" />
                    <img src="imagens/img_x6.jpg" id="img6" />
                    <img src="imagens/img_x7.jpg" id="img7" />
                    <img src="imagens/img_x8.jpg" id="img8" />
		</div>
                <div id="ct">
                    <p class="txtpgi">
                        Hello, welcome to Powerfull Coffee.
                        <br><br>
                        We use quality products to offer the greatest satisfaction to your taste.
                        <br>
                        Browse the menu, choose your products and add to the cart.
                        <br>
                        Everything here is prepared with great care and love.
                        <br>
                        Take advantage of the daily Black Friday promotions.
                        <br><br>
                        Enjoy your food!
                        <br><br>
                        Check back often!
                    </p>
                </div>
                <div class="letreiro">
                    <marquee behavior="alternate" width="1150" eigth="50" scrollamount="2"
                        direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        ENJOY THE BLACK FRIDAY PROMOTION, BUY A CHICKEN PIE AND WIN A BLACK COFFEE!
                    </marquee>
                </div>    
            </div>
        </div>
    </body>
</html>
