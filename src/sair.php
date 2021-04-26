<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Destruir sessão
        session_start();
        unset($_SESSION['id_usuario']);
        header("location: index.php");
        ?>
    </body>
</html>
