<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>
        <?php
        if(isset($_GET["msgerro"])){
           echo $_GET["msgerro"];
        }
        else{
            echo "General error.";
        }
        ?>           
        </h2>
        <br>
            <a href="javascript:history.back()">Return</a>
    </body>
</html>
