<?php
    if (
        isset($_POST["form_nome"]) &&
        isset($_POST["form_preco"]) && 
        isset($_POST["id_categoria"]))
        {
            $nome = $_POST["form_nome"];
            $preco = $_POST["form_preco"];
            $id_categoria = $_POST["id_categoria"];
            $id = $_POST["form_id"];
            $sqlUpdate = "update produtos "
                    . "set nome = :nome,"
                    . "preco = :preco,"
                    . "id_categoria = :id_categoria"
                    . " where id = :id";
            $conexaoBD = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
            $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
            $sqlPreparado->bindParam(":nome", $nome);
            $sqlPreparado->bindParam(":preco", $preco);
            $sqlPreparado->bindParam(":id_categoria", $id_categoria);
            $sqlPreparado->bindParam(":id", $id);
            $conexaoBD->beginTransaction();
            $resultado = $sqlPreparado->execute();
            // efetivar a transação
            $conexaoBD->commit();
            $resultado = null;
            $sqlPreparado = null;
            $conexaoBD = null;
        }
    header("Location:consultarProduto.php");
?>    
