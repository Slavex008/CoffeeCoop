<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Cliente.php");
    include_once("../Persistence/ClienteDAO.php");
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $clienteDao = new ClienteDAO();
        
    try {
        $retorno = $clienteDao->logar($usuario, $senha, $link);
    
        $rs = $retorno->fetch_all();

        foreach($rs as $linha) {
            $idCliente = $linha[0];
            $nome = $linha[1];
            $user = $linha[2];
            $pass = $linha[3];
            
        }

        $cliente = new Cliente($idCliente, $nome, $user, $pass, $pass);

        $SQL = "String = ".$cliente->getId().",
                        ".$cliente->getNome()."',
                        '".$cliente->getUsuario()."',
                        '".$cliente->getSenha()."');";
                        
        session_start();
        $_SESSION["user"] = $idCliente;

        header("Location: ../View/TelaInicialCliente.php"); //Página inicial após login
    } catch (Exception $e){
        echo $e->getMessage();
    }

        $conexao->fechar();
?>
