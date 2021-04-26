<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <!--CORRIJE ERROS-->
        <meta charset="UTF-8">
        <!--COMEÇO DE RESPONS�?VEL-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CONECTA AO ARQUIVO DE LINGUAGEM CSS-->
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
        <!--box maior-->
        <div id="boxdiv1">      
            <!--imagem letra Powerfull Coffee-->
            <div id="boxlogo11">
                    <img class="boximglogo11" src="imagens/letra_powerfullcoffee.png" alt="Powerfull Coffee" border="0">
            </div>
            <!--box menu-->
            <div id="boxmenu">
                <!--<ul class="ul">
                     <!--   <li class="li"><a class="active" href="#">Coffee</a></li>	                  
                </ul>	-->
            </div>
            <!--cx imagem letra carrinho-->
            <div id="boxlogo1"> 
                <img src="imagens/letra_cart.png" alt="Carrinho" border="0">
            </div>
                <img id ='boximgx'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx2'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx3'src='imagens/img_xicara.png' alt='imagem'>
                <img id ='boximgx4'src='imagens/img_xicara.png' alt='imagem'>
                <p class="botaosair">
                    <a href="sair.php">Exit (x)</a>
                </p>
            <!--cx box maior2-->
            <div id="boximg1-1">
                <?php
                    /*session_start();*/
                    if(!isset($_SESSION['itens'])){
                        $_SESSION['itens'] = array();
                    }
                    //se clicou no botao add carrinho
                    if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
                        //Adiciona ao carrinho
                        $idProduto = $_GET['id'];
                        //se nao tiver produto daquele id adicionado, ele é quantidade 1, senao a quantidade aumenta
                        if(!isset($_SESSION['itens'][$idProduto])){
                            $_SESSION['itens'][$idProduto] = 1;
                        }else{
                            $_SESSION['itens'][$idProduto] += 1;
                        }
                    }
                    //Exibe o carrinho
                    if(count($_SESSION['itens']) == 0){
                        ?>
                            <h2>You cart contains no items!</h2>
                        <?php
                    }else{
                    ?>
                    <table>
                        <tr>
                            <!--<td class="edttd"></td>-->
                            <td class="edttd">Description</td>
                            <td class="edttd">Unit Price</td>
                            <td class="edttd">Amount</td>
                            <td class="edttd">Total Price</td>
                        </tr>
                        <br><br>
                        <?php
                            $totalfinal=0;
                            $conexao = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
                            foreach($_SESSION['itens'] as $idProduto => $quantidade){
                                $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
                                $select->bindParam(1,$idProduto);
                                $select->execute();
                                $produtos = $select->fetchAll(); //para mostrar todos os produtos
                                $total = $quantidade * $produtos[0]["preco"];
                                $totalfinal += $total;
                        ?>
                        <tr>
                            <td class="edttx1"><?php echo $produtos[0]['nome'] ?></td>
                            <td class="edttx1"><?php echo number_format($produtos[0]['preco'],2) ?></td>    
                            <td class="edttx1"><?php echo $quantidade ?></td> 
                            <td class="edttx1"><?php echo number_format($total,2)?></td>  
                            <td class="edttx1">
                                <?php 
                                    echo '<a href="remover.php?remover=carrinho&id='.$idProduto.'"><button class="botoes">To Remove</button></a>';
                                ?>
                            </td>
                        </tr>
                    <?php }                                                
                        echo '<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="edttx3">Final Price</td>
                                <td class="edttx3">'. "$   ".number_format($totalfinal,2).'</td>
                             </tr> ';  
                    ?>    
                    </table>                               
                    <?php }?>     
                <!--botão do carrinho-->
                <p class="botaoadd">
                    <a href="menuCoffee.php">+ Add Items</a>
                </p>
            </div>                   
        </div> 
    </body>
</html>