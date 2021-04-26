
<!DOCTYPE html>
<html>
    <head>
        <title>Sweets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>  
    </head>
    <body>
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
                    <li class="li"><a href="paginaInicial.php">Powerfull Coffee</a></li>	    
                    <li class="li"><a  href="menuCoffee.php">Coffee</a></li>	                  
                    <li class="li"><a href="menuTea.php">Tea</a></li>
                    <li class="li"><a href="menuChocolate.php">Chocolate</a></li>
                    <li class="li"><a class="active" href="menuSweets.php">Sweets</a></li>
                    <li class="li"><a href="menuSavory.php">Savory</a></li>
                </ul>	
            </div>
            <!--cx que encaixa a imagem letra-->
            <div id="boxlogo1"> 
                <img src="imagens/letra_menu.png" alt="Menu" border="0">
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
                
                <?php
                    $conexao = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
                    $select = $conexao->prepare("SELECT * FROM produtos where id_categoria = 4");
                    $select->execute();
                    $fetch = $select->fetchAll(); //para mostrar todos os produtos
                ?>
                <table>
                    <tr>
                        <!--<td class="edttd"></td>-->
                        <td class="edttd">Description</td>
                        <td class="edttd">Unit Price</td>
                        <td class="edttd"></td>
                    </tr>
                    <br><br>
                    <?php foreach ($fetch as $produtos){?>    
                        <tr>
                            <!--<td class="edttx1"><img class="tamimg" src="imagens/img1.png"></td>-->
                            <td class="edttx1"><?php echo $produtos['nome'] ?></td>
                            <td class="edttx1"><?php echo number_format($produtos['preco'],2) ?></td>                          
                            <td class="edttx1">
                                <?php 
                                echo '<a href="carrinho.php?add=carrinho&id='.$produtos['id'].'"><button class="botoes">Add to Cart</button></a>';
                                ?>
                            </td>
                        </tr>
                    <?php }?>    
                </table>        
            </div>
        </div>
    </body>
</html>
