<?php

    include_once("C_SacaDeCafe.php");
    session_start();

    $idProdutor = $_SESSION["user"];
    $tipo = $_POST["tipo"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    $valorPorSaca = $_POST["valor"];
    
    $controller = new C_SacaDeCafe();
    $controller->cadastraSaca($idProdutor, $tipo, $quantidade, $data, $valorPorSaca);
?>
