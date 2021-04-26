<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login Registration</title>
        <!--Link para conectar ao css-->
        <link rel="stylesheet" type="text/css" href="css/estilologin.css">
    </head>
    <body>
        <!--centralizar todo o corpo-->
        <div id="corpo-form-Cad">
            <h1>Register</h1>
            <form method="POST">
                <!--dados-->
                <input type="text" name="nome" placeholder="Name" maxlength="30">
                <input type="text" name="telefone" placeholder="Telephone" maxlength="30">
                <input type="email" name="email" placeholder="Login Email" maxlength="40">
                <input type="password" name="senha" placeholder="Password" maxlength="15">                
                <input type="password" name="confSenha" placeholder="Confirm password"> 
                <!--botão-->
                <input type="submit" value="Register">    
            </form>
        </div>                            
        
        <?php
            //verificar se clicou no botao
            //isset verifica a existencia de uma variavel
            if(isset($_POST['nome'])){
                $id = addslashes($_POST['nome']);     //addslashes para prevenção e segurança
                $telefone = addslashes($_POST['telefone']); 
                $email = addslashes($_POST['email']); 
                $senha = addslashes($_POST['senha']); 
                $confirmarSenha = addslashes($_POST['confSenha']); 
                //verificar se esta preenchido
                //se não está vazio a variavel nome E não esta vazio telefone E ...
                if(!empty($id) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
                    $u->conectar("projetosoftware","localhost","root","");
                    //se esta tudo ok
                    if($u->msgErro == ""){
                        //se a senha for igual ao confirmar senha
                        if($senha == $confirmarSenha){
                            if($u->cadastrar($id, $telefone, $email, $senha)){
                            ?>
                            <div id="msg-sucesso">
                                Registered successfully!<br>
                                <a href="index.php"><strong>Click here to login!</strong></a>
                            </div>
                            <?php
                            }
                            else{
                                ?>
                                <div class="msg-erro">
                                    Email is already registered!
                                </div>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div class="msg-erro">
                                Password and Confirm do not match!
                            </div>
                            <?php
                            }
                    }
                    else{
                        ?>
                        //mostrar o erro
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