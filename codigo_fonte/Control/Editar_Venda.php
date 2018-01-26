<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Persistence/VendaDAO.php");
    session_start();
    
    $idCliente = $_SESSION["user"];
    $idSaca = $_GET["id"];
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $vendaDao = new VendaDAO();
    echo $vendaDao->editarAguardandoAprovacao($idSaca, $idCliente, 1, $link);
    
    $conexao->fechar();
    
    header("Location: ../View/TelaInicialCliente.php");

?>
