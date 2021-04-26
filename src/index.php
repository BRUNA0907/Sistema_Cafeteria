<!--
ANTES DE RODAR, ADICIONAR O BANCO DE DADOS 'projetosoftware' que disponibilizarei no arquivo!!
-->
<!--Instanciar a classe do login-->
<?php
require_once 'classes/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!--<meta charset="UTF-8">-->
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <title>Login</title>
        <!--Link para conectar ao css-->
        <link rel="stylesheet" type="text/css" href="css/estilologin.css">
    </head>
    <body>
        <!--centralizar todo o corpo-->
        <div id="corpo-form">
            <h1>Login</h1>
            <form method="POST">
                <!--e-mail de login-->
                <input type="email" name="email" placeholder="User">
                <!--senha-->
                <input type="password" name="senha" placeholder="Password"> 
                <!--botão-->
                <input type="submit" value="ACCESS">    
                <a href="cadastrar.php">Not registered yet? <strong>Click here to register!</strong></a>
            </form>
        </div>                           
        
        <?php
            if(isset($_POST['email'])){
                $email = addslashes($_POST['email']); 
                $senha = addslashes($_POST['senha']); 
                //verificar se esta preenchido
                //se não está vazio as variaveis  ...
                if(!empty($email) && !empty($senha)){
                    $u->conectar("projetosoftware", "localhost", "root", "");
                    //se a msg estiver vazia
                    if($u->msgErro == ""){
                        if($u->logar($email, $senha)){
                            //se estiver tudo certo, será encaminhado para essa área privada
                            header("location: paginaInicial.php");
                        }
                        else{
                            ?>
                            <div class="msg-erro">
                                Email and/or Password are incorrect!
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$u->msgErro; ?>
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                        <div class="msg-erro">
                            Fill in all fields!
                        </div>
                    <?php
                }
            }
        ?>
    </body>
</html>