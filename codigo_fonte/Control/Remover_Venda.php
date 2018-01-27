<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Persistence/VendaDAO.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    
    $id = $_GET["id"];
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $vendaDAO = new VendaDAO();
    $vendaDAO->excluirVenda($id, $link);
    
    $sacaDao = new SacaDeCafeDAO();
    $sacaDao->excluir($id, $link);
    
    header("Location: ../View/TelaInicialGerente.php");
    
?>
