<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Cliente.php");
	include_once("../Persistence/ClienteDAO.php");
	
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$confirmaSenha = $_POST["confirmaSenha"];

	
	$conexao = new Conexao('localhost', 'root', 'aluno', 'CoffeeCoop');
	$link = $conexao->getLink();
	
	$cliente = new Cliente(0, $nome, $usuario, $senha, $confirmaSenha);

	
	$clienteDao = new ClienteDAO();
	$clienteDao->cadastrar($cliente, $link);
	header("Location: ../Views/LoginCliente.html");
	$conexao->fechar();
?>
