<?php
header('Content-Type: text/html; charset=utf-8');

class Conexao{
	var $servidor;
	var $usuario;
	var $senha;
	var $bd;
	var $link;
	
	function Conexao($servidor, $usuario, $senha, $bd) {
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->senha = "aluno";
		$this->bd = $bd;
		
		$this->link = mysqli_connect($this->servidor,
						$this->usuario,$this->senha,$this->bd);
	
		if(!$this->link) {
			die("conexao falhou");
		}
		
	}
	function getLink(){
		return $this->link;
	}
	
	function fechar(){
		mysqli_close($this->link);
	}
}

?>
