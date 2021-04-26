<?php
    $conexaoBD = new PDO('mysql:host=localhost;dbname=projetosoftware',"root","");
    if (isset($_POST["form_nome"]) &&
        isset($_POST["form_preco"]) &&
        isset($_POST["form_categoria"]))
    {
        $id = $_POST["form_nome"];
        $preco = $_POST["form_preco"];
        $categoria = $_POST["form_categoria"];
        $sql = "insert into produtos"
                . "(nome, preco, id_categoria)"
                . "values ('$id','$preco','$categoria')";
        try{
            $incluiu = $conexaoBD->query($sql); // realiza a operação de inclusão
            $conexaoBD = null;
        }
        catch (Exception $e){
              header("Location:./erro.php?msgerro=" 
                      . erro_bd($e->getMessage()));             
        }  
    }
    header("Location: consultarProduto.php");
