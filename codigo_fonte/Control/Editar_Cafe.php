<?php
    include_once("C_SacaDeCafe.php");
    
    session_start();
    $idProdutor = $_SESSION["user"];
    $tipo = $_POST["tipo"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    $id = $_GET["id"];
    $valorPorSaca = $_POST["valor"];
    
    
    $controller = new C_SacaDeCafe();
    $controller->editaSaca($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $data);
    
?>
