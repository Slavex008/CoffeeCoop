<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Gerente.php");
	include_once("../Persistence/GerenteDAO.php");
	
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$confirmaSenha = $_POST["confirmaSenha"];
	
	if(strcmp($senha, $confirmaSenha) != 0) {
		echo "Senha e confirmaSenha diferentes!";
		return;
	}
	
	$conexao = new Conexao();
	$link = $conexao->getLink();
	
	$gerente = new Gerente(0, $nome, $usuario, $senha, $confirmaSenha);

	
	$gerenteDao = new GerenteDAO();
	$gerenteDao->cadastrar($gerente, $link);
	header("Location: ../View/LoginGerente.html");
	$conexao->fechar();
?>
