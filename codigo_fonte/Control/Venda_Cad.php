<?php

    header('Content-Type: text/html; charset=utf-8');
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Venda.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    include_once("../Persistence/VendaDAO.php");
    
    
    $idSaca = $_GET["id"];
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $sacaDAO = new SacaDeCafeDAO();
    $retorno = $sacaDAO->buscarSaca($idSaca, $link);
    $saca = NULL;
    $rs = $retorno->fetch_all();
    foreach($rs as $r) {
        $saca = new SacaDeCafe($r[0], $r[5], $r[1], $r[3], $r[4], $r[2]);
    }
    $retorno = NULL;
    if($saca != NULL) {
        $venda = new Venda($idSaca, NULL, $saca->getValorPorSaca(), 0);    
        $vendaDao = new VendaDAO();
        $retorno = $vendaDao->cadastrarVenda($venda, $link);
        
    }
    echo "<p>".$retorno."</p><a href='../View/TelaInicialProdutor.php'><button>OK</button>";
    $conexao->fechar();
    //header("Location: ../View/TelaInicialProdutor.php");
?>
