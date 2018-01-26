<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    
    $tipoBusca = $_POST["inputbusca"];
    if($tipoBusca == NULL) {
        header("Location: ../View/TelaInicialProdutor.php");
    }
    
?>
