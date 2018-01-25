<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Produtor.php");
	include_once("../Persistence/ProdutorDAO.php");
	
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
	
	$produtor = new Produtor(0, $nome, $usuario, $senha, $confirmaSenha);

	
	$produtorDao = new ProdutorDAO();
	$produtorDao->cadastrar($produtor, $link);
	header("Location: ../View/LoginProdutor.html");
	$conexao->fechar();
?>
