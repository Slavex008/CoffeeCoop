<?php
header('Content-Type: text/html; charset=utf-8');

class Venda{
    private $idSaca;
    private $idCliente;
    private $valorPorSaca;
    private $aguardandoAprovacao;

    function Venda($idSaca, $idCliente, $valorPorSaca, $aguardandoAprovacao = 0) {
        $this->idSaca = $idSaca;
        $this->idCliente = $idCliente;
        $this->valorPorSaca = $valorPorSaca;
        $this->aguardandoAprovacao = $aguardandoAprovacao;
    }

    function getIdSaca(){
        return $this->idSaca;
    }
    function getIdCliente(){
        return $this->idCliente;
    }
    function getValorPorSaca(){
        return $this->valorPorSaca;
    }
    function getAguardandoAprovacao(){
        return $this->aguardandoAprovacao;
    }

}

?>
