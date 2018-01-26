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
    $id = $_GET["id"];
    $valorPorSaca = $_POST["valor"];
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $saca = new SacaDeCafe($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $data);

    
    $sacaDao = new SacaDeCafeDAO();
    echo $sacaDao->editar($saca, $link);
    
    $conexao->fechar();
    
    header("Location: ../View/TelaInicialProdutor.php");
?>
