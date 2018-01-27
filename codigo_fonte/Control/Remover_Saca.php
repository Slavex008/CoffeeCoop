<?php
    include_once("C_SacaDeCafe.php");
    
    
    $id = $_GET["id"];
    
    $controller = new C_SacaDeCafe();
    $controller->removeSaca($id);
    
?>
