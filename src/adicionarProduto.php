<!DOCTYPE html>
<html>
    <head>
        <title>New Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>  
    </head>
    <body>
        <?php
            //Verificar se a sess�o foi aberta //se login foi realizado com sucesso
            session_start();
            //criado no momento que a pessoa fez o login
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
                    <li class="li"><a href="consultarProduto.php">Consult Products</a></li>	                  
                    <li class="li"><a class="active" href="adicionarProduto.php">Register Product</a></li>
                </ul>	
            </div>
            <!--cx que encaixa a imagem letra-->
            <div id="boxlogo1"> 
                <img src="imagens/letra_admin.png" alt="Menu" border="0">
            </div>
                <img id ='boximgx'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx2'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx3'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx4'src='imagens/img_xicara.png' alt='imagem'>
                <p class="botaosair">
                    <a href="sair.php">Exit (x)</a>
                </p>
            <!--em que estou encaixando o corpo da p�gina-->
            <div id="boximg1-1">    
                <p style='font-size: 20pt;' class='edttx6'>Add New Product</p>
                <div>
                    <form action="salvarNovoProduto.php" method="post" >
                       <fieldset>
                            <legend class='edttx6'>Product Information</legend><br><br>     
                            <label class="edttx1">Product Name</label><br>
                            <input class="edt_input" type="text" name="form_nome" value=""><br>
                            <label class="edttx1">Price</label><br>
                            <input class="edt_input" type="text" name="form_preco" value=""><br>
                            <label class="edttx1">Category</label><br>
                            <select class="edt_input" name="form_categoria">
                                    <option name="1">1 - Coffee</option>
                                    <option name="2">2 - Tea</option>
                                    <option name="3">3 - Chocolate</option>
                                    <option name="4">4 - Sweets</option>
                                    <option name="5">5 - Savory</option>
                            </select>
                            <br><br>
                            <input class='btenviar' type="submit" value="To Save">
                            <br><br>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>