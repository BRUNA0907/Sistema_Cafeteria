<?php
    session_start();
    if(isset($_GET['remover']) && $_GET['remover'] == "carrinho"){
        $idProduto = $_GET['id'];
        unset($_SESSION['itens'][$idProduto]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrinho.php"/>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        ?>
    </body>
</html>
