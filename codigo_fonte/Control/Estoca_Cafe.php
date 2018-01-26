<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    session_start();
    $idProdutor = $_SESSION["user"];
    $tipo = $_POST["tipo"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    $valorPorSaca = $_POST["valor"];
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    
    $saca = new SacaDeCafe(0, $idProdutor, $tipo, $quantidade, $valorPorSaca,$data);

    
    $sacaDao = new SacaDeCafeDAO();
    $sacaDao->cadastrar($saca, $link);
    
    $conexao->fechar();
    
    header("Location: ../View/TelaInicialProdutor.php");
?>
