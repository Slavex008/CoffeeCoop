<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Cliente.php");

class ClienteDAO{

	
	function cadastrar($cliente, $link) {
		$SQL = "INSERT INTO Cliente VALUES ('0','".$cliente->getNome()."',
											'".$cliente->getUsuario()."',
											'".$cliente->getSenha()."');";

		echo $SQL."<br>";
		
		if (!mysqli_query($link, $SQL)) {
			die("Erro na inserção do usuário");
		}
		echo "Usuario cadastrado com sucesso!";
		
	}
	
	function Excluir($usuario, $link) {
		$SQL = "DELETE FROM Cliente WHERE usuario ='".$cliente->getUsuario()."';";
		echo $SQL."<br>";
		
		if(!mysqli_query($link, $SQL)){
			die("Erro na exclusão de cliente");
		}
		echo "Cliente deletado com sucesso!";
		
	}
	
	function logar($usuario, $senha, $link) {
		$SQL = "SELECT * FROM Cliente WHERE usuario ='".$usuario."' and senha = '".$senha."';";

		$retorno = mysqli_query($link, $SQL);
		echo $SQL;		
		
		if (mysqli_num_rows($retorno) > 0) {
			return $retorno;
		} else {
			//die("Erro na consulta de cliente");
			throw new Exception('usuario ou senha incorretos!');
		}
		
	}
	
}

?>
