<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>  
    </head>
    <body>
        <?php
            session_start();
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
                    <li class="li"><a href="adicionarProduto.php">Register Product</a></li>
                        <li class="li"><a href="#"></a></li>
                        <li class="li"><a href="#"></a></li>
                        <li class="li"><a href="#"></a></li>
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
            <!--em que estou encaixando o corpo da página-->
            <div id="boximg1-1">    
                <?php
                    if ( ! isset($_GET["id"])){
                        header("Location:index.php");
                    }
                    $id = $_GET["id"];
                    // estabele a conexao com o banco de dados
                    $conexaoBD = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
                    $sql = "select * from produtos where id = $id";
                    // realiza a consulta ao banco de dados
                    $resultado = $conexaoBD->query($sql);
                    // converte o resultado em um vetor
                    $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="AtualizarProduto.php" method="post">
                   <fieldset>
                       <legend style='font-size: 20pt;' class='edttx6'>Edit Product</legend><br><br>
                        <label class='edttx1'>ID</label><br>
                        <input class='edt_input' readonly type="text" name="form_id" value="<?= $registro["id"] ?>"><br>
                        <label class='edttx1'>Product : </label> <br>                   
                        <input class='edt_input' type="text" name="form_nome" value="<?= $registro["nome"] ?>"><br>
                        <label class='edttx1'>Price</label><br>
                        <input class='edt_input' type="text" name="form_preco" value="<?= $registro["preco"] ?>"><br>
                        <label class='edttx1'>Category</label><br>
                        <select class='edt_input' name="id_categoria">
                            <option name="1">1 - Coffee</option>
                            <option name="2">2 - Tea</option>
                            <option name="3">3 - Chocolate</option>
                            <option name="4">4 - Sweets</option>
                            <option name="5">5 - Savory</option>
                        </select>
                        <br><br>
                        <input class='btenviar' type="submit" value="To Save"/>
                    </fieldset>
                </form>
                <a href="consultarProduto.php"><button class='btenviar2'> Return </button> </a>
                <?php
                    // libera o objeto de resultado da consulta
                    $resultado = null;
                    // remove a conexao com o banco de dados
                    $conexaoBD = null;
                ?>
            </div>
        </div>
    </body>
</html>