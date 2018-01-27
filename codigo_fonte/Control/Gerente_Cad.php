<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Gerente.php");
    include_once("../Persistence/GerenteDAO.php");
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $gerente = new Gerente(0, $nome, $usuario, $senha);
    $gerenteDao = new GerenteDAO();
    
    
    $retorno = $gerenteDao->cadastrar($gerente, $link, $confirmaSenha);
    $msg = NULL;
    $textoBTN = NULL;
    switch($retorno) {
            case 0:
                -$msg = "Cadastro feito com sucesso!";
                $textoBTN = "Confirmar";
                $caminho = "../View/LoginGerente.html";
                break;
            case -1:
                $msg = "Ocorreu um erro no cadastro! Pode ser que o nome de usuario ja esteja sendo usado.";
                $textoBTN = "Retornar";
                $caminho = "../View/CadastroGerente.html";
                break;
            case -2:
                $msg = "Senha e confirmação de senha são diferentes";
                $textoBTN = "Retornar";
                $caminho = "../View/CadastroGerente.html";
                break;
    }
    $conexao->fechar();
    echo "<h4></h4>".$msg."<br>
          <a href='".$caminho."'><button>".$textoBTN."</button></a>";

    //header("Location: ../View/LoginGerente.html");
    
?>
