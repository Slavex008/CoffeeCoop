<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    $id = $_GET["id"];
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $sacaDAO = new SacaDeCafeDAO();
    $sacaDAO->excluir($id, $link);
    
    header("Location: ../View/TelaInicialProdutor.php");
    
?>
