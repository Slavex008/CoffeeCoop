<?php
header('Content-Type: text/html; charset=utf-8');

class Cliente{
	var $id;
	var $nome;
	var $usuario;
	var $senha;


	
	function Cliente($id, $nome, $usuario, $senha, $confirmaSenha) {
		if ($senha != $confirmaSenha) {
			echo "Senha de confirmação diferente";
			return;
		}

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
