<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Venda.php");
	include_once("../Persistence/VendaDAO.php");
	
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$confirmaSenha = $_POST["confirmaSenha"];
	
	$conexao = new Conexao();
	$link = $conexao->getLink();
	
	$venda = new Venda($idSaca, NULL, $valorPorSaca, 0);

	
	$vendaDao = new VendaDAO();
	$vendaDao->cadastrar($venda, $link);
	header("Location: ../View/TelaInicialCliente.php");
	$conexao->fechar();
?>
