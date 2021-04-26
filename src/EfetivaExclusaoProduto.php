<?php
    if (isset($_POST["form_nome"])){
        $id = $_POST["form_nome"];
        $sqlUpdate = "delete from produtos "
                . " where nome = :nomeProduto";
        $conexaoBD = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
        $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
        $sqlPreparado->bindParam(":nomeProduto", $id);
        //iniciar uma transação atómica
        try{
            $conexaoBD->beginTransaction();
            $resultado = $sqlPreparado->execute();
            // efetivar a transação
            $conexaoBD->commit();
            $resultado = null;
            $sqlPreparado = null;
            $conexaoBD = null;
            header("Location:consultarProduto.php");
        }
        catch (Exception $e){
         //$conexaoBD->roolback();
          header("Location:./erro.php?msgerro=" 
                  . erro_bd($e->getMessage()));
        }
    }
?>    
