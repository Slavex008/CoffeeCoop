<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Produtor.php");

class ProdutorDAO{

	
	function cadastrar($produtor, $link) {
		$SQL = "INSERT INTO Produtor VALUES ('0','".$produtor->getNome()."',
											'".$produtor->getUsuario()."',
											'".$produtor->getSenha()."');";

		echo $SQL."<br>";
		
		if (!mysqli_query($link, $SQL)) {
			die("Erro na inserção do usuário");
		}
		echo "Usuario cadastrado com sucesso!";
		
	}
	
	function Excluir($produtor, $link) {
		$SQL = "DELETE FROM Produtor WHERE usuario ='".$produtor->getUsuario()."';";
		echo $SQL."<br>";
		
		if(!mysqli_query($link, $SQL)){
			die("Erro na exclusão de cliente");
		}
		echo "Cliente deletado com sucesso!";
		
	}
	
	function logar($usuario, $senha, $link) {
		$SQL = "SELECT * FROM Produtor WHERE usuario ='".$usuario."' and senha = '".$senha."';";

		$retorno = mysqli_query($link, $SQL);

		if (mysqli_num_rows($retorno) > 0) {
			return $retorno;
		} else {
			//die("Erro na consulta de cliente");
			throw new Exception('usuario ou senha incorretos!');
		}
		
	}
	
}

?>
