<?php
header('Content-Type: text/html; charset=utf-8');

class Produtor{
    var $id;
    var $nome;
    var $usuario;
    var $senha;


    
    function Produtor($id, $nome, $usuario, $senha) {

        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;  
    }

    function getId(){
        return $this->id;
    }

    function getNome(){
        return $this->nome;
    }
    function getUsuario(){
        return $this->usuario;
    }
    function getSenha(){
        return $this->senha;
    }
    
}

?>
