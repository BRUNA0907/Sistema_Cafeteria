<!DOCTYPE html>
<html>
    <head>
        <title>Consult Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>  
    </head>
    <body>
        <?php
            session_start();
            $conexaoBD = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
            $sql = "SELECT p.id, p.nome, p.preco, c.id_categoria, c.nome_categoria from produtos p INNER JOIN categoria c ON p.id_categoria = c.id_categoria order by p.id_categoria;";
            $resultado = $conexaoBD->query($sql);
        ?>
        <!--box maior em que se encaixa os demais-->
        <div id="boxdiv1-corpo">      
            <!--imagem letra powerfull coffee-->
            <div id="boxlogo11">
                    <img class="boximglogo11" src="imagens/letra_powerfullcoffee.png" alt="Powerfull Coffee" border="0">
            </div>
            <!--box do menu-->
             <div id="boxmenu">
                <ul class="ul">
                    <li class="li"><a class="active" href="consultarProduto.php">Consult Products</a></li>	                  
                    <li class="li"><a href="adicionarProduto.php">Register Product</a></li>
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
            <div id="boximg1-1-corpo">    
                <table width='467' cellspacing='20'>
                    <thead>
                        <tr>
                            <th class='edttx5'>Name</th>
                            <th class='edttx5'>Price</th>
                            <th class='edttx5'>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td class='edttx4'>" . $registro["nome"] . "</td>".
                                     "<td class='edttx4'>" . $registro["preco"] . "</td>".
                                     "<td class='edttx4'>" . $registro["nome_categoria"] . "</td>".
                                     "<td class='edttx4'>" . "<a href='editarProduto.php?id=" . $registro["id"] . "'><button class='botoesedit'>Edit</button></a>" . "</td>".
                                     "<td class='edttx4'>" . "<a href='excluirProduto.php?id=" . $registro["id"] . "'><button class='botoesdelete'>Delete</button></a>" . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </body>
</html>