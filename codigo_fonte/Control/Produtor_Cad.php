<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Produtor.php");
    include_once("../Persistence/ProdutorDAO.php");
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];
    
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $produtor = new Produtor(0, $nome, $usuario, $senha);
    $produtorDao = new ProdutorDAO();
    $retorno = $produtorDao->cadastrar($produtor, $link, $confirmaSenha);
    $msg = NULL;
    $textoBTN = NULL;
    switch($retorno) {
            case 0:
                -$msg = "Cadastro feito com sucesso!";
                $textoBTN = "Confirmar";
                $caminho = "../View/LoginProdutor.html";
                break;
            case -1:
                $msg = "Ocorreu um erro no cadastro! Talvez o nome de usuario ja esteja sendo usado.";
                $textoBTN = "Retornar";
                $caminho = "../View/CadastroProdutor.html";
                break;
            case -2:
                $msg = "Senha e confirmação de senha são diferentes";
                $textoBTN = "Retornar";
                $caminho = "../View/CadastroProdutor.html";
                break;
    }
    echo "<h4></h4>".$msg."<br>
          <a href='".$caminho."'><button>".$textoBTN."</button></a>";

    
    //header("Location: ../View/LoginProdutor.html");
    $conexao->fechar();
?>
