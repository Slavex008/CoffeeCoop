<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Gerente.php");

class GerenteDAO{

	
	function cadastrar($gerente, $link) {
		$SQL = "INSERT INTO Gerente VALUES ('0','".$gerente->getNome()."',
											'".$gerente->getUsuario()."',
											'".$gerente->getSenha()."');";

		echo $SQL."<br>";
		
		if (!mysqli_query($link, $SQL)) {
			die("Erro na inserção do usuário");
		}
		echo "Usuario cadastrado com sucesso!";
		
	}
	
	function Excluir($gerente, $link) {
		$SQL = "DELETE FROM Gerente WHERE usuario ='".$gerente->getUsuario()."';";
		echo $SQL."<br>";
		
		if(!mysqli_query($link, $SQL)){
			die("Erro na exclusão de cliente");
		}
		echo "Cliente deletado com sucesso!";
		
	}
	
	function logar($usuario, $senha, $link) {
		$SQL = "SELECT * FROM Gerente WHERE usuario ='".$usuario."' and senha = '".$senha."';";

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
