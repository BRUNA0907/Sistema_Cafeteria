<?php

class Usuario{
    private $pdo;
    public $msgErro = "";
    
    public function conectar($nome, $host, $usuario, $senha){        
        global $pdo; //se não colocar o global vai pensar que é outra variável
        global $msgErro;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }            
    }
    
    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo; //se não colocar o global vai pensar que é outra variável
        global $msgErro;    
        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("select id_usuario from usuarios where email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;   //ja esta cadastrada
        }
        else{
            //caso nao, Cadastrar
            $sql = $pdo->prepare("insert into usuarios (nome, telefone, email, senha) values (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha)); //md5 para criptografar a senha
            $sql->execute();    
            return true; //tudo ok
        }
    }
    
    public function logar($email, $senha){
        global $pdo; //se não colocar o global vai pensar que é outra variável
        global $msgErro;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("select id_usuario from usuarios where email = :e and senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha)); //md5 criptografa senha
        $sql->execute();
        
        //administrador
        if($email == "adm@adm" && $senha== 123){
            header("Location: consultarProduto.php");
        }
        
        if($sql->rowCount() > 0){
            //entrar no sistema (sessao)
            $dado = $sql->fetch(); //pega tudo do banco de dados e transforma num array com as colunas
            session_start();
            //o login do usuario agora está armazenado numa sessao
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso
        }
        else{
            return false; //nao foi possivel logar
        }        
    }
}

