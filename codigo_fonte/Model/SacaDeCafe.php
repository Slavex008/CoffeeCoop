<?php
header('Content-Type: text/html; charset=utf-8');

class SacaDeCafe{
    var $id;
    var $idProdutor;
    var $tipo;
    var $quantidade;
    var $dataArmazenamento;

    function SacaDeCafe($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $dataArmazenamento) {
        $this->id = $id;
        $this->idProdutor = $idProdutor;
        $this->tipo = $tipo;
        $this->quantidade = $quantidade;
        $this->valorPorSaca = $valorPorSaca;
        $this->dataArmazenamento = $dataArmazenamento;
    }

    function getId(){
        return $this->id;
    }
    function getIdProdutor(){
        return $this->idProdutor;
    }
    function getTipo(){
        return $this->tipo;
    }
    function getQuantidade(){
        return $this->quantidade;
    }
    function getDataArmazenamento(){
        return $this->dataArmazenamento;
    }
    function getValorPorSaca() {
        return $this->valorPorSaca;
    }
    
}

?>
