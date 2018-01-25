<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Gerente.php");
	include_once("../Persistence/GerenteDAO.php");
	
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$confirmaSenha = $_POST["confirmaSenha"];

	
	$conexao = new Conexao('localhost', 'root', '', 'CoffeeCoop');
	$link = $conexao->getLink();
	
	$gerente = new Gerente(0, $nome, $usuario, $senha, $confirmaSenha);

	
	$gerenteDao = new GerenteDAO();
	$gerenteDao->cadastrar($gerente, $link);
	
	$conexao->fechar();
?>
