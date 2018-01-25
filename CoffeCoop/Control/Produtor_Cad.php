<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Produtor.php");
	include_once("../Persistence/ProdutorDAO.php");
	
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$confirmaSenha = $_POST["confirmaSenha"];

	
	$conexao = new Conexao('localhost', 'root', '', 'CoffeeCoop');
	$link = $conexao->getLink();
	
	$produtor = new Produtor(0, $nome, $usuario, $senha, $confirmaSenha);

	
	$produtorDao = new ProdutorDAO();
	$produtorDao->cadastrar($produtor, $link);
	
	$conexao->fechar();
?>