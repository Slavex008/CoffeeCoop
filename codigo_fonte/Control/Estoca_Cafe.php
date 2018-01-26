<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Cliente.php");
    include_once("../Persistence/ClienteDAO.php");
    session_start();
    $idProdutor = $_SESSION["user"];
    $tipo = $_POST["tipo"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    echo "AQUI\n\n\n\n";
    echo $idProdutor;
    echo "<br><br>";
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $saca = new SacaDeCafe(0, $idProdutor, $tipo, $quantidade, $data);

    
    $sacaDao = new SacaDeCafeDAO();
    $sacaDao->cadastrar($saca, $link);
    
    $conexao->fechar();
?>
