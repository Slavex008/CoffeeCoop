<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Cliente.php");
	include_once("../Persistence/ClienteDAO.php");
	
	$idProdutor;
	$tipo = $_POST["tipo"];
	$quantidade = $_POST["quantidade"];
	$data = $_POST["data"];


	
	$conexao = new Conexao('localhost', 'root', '', 'CoffeeCoop');
	$link = $conexao->getLink();
	
	$cliente = new Cliente(0, $nome, $usuario, $email, $senha, $confirmaSenha);

	
	$clienteDao = new ClienteDAO();
	$clienteDao->cadastrar($cliente, $link);
	
	$conexao->fechar();
?>
