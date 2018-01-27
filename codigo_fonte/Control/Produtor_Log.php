<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Produtor.php");
    include_once("../Persistence/ProdutorDAO.php");
    include_once("../View/EstocarCafe.php");
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $produtorDao = new ProdutorDAO();
        
    $retorno = $produtorDao->logar($usuario, $senha, $link);
    if($retorno < 0) {
        echo 'Usuario ou senha incorretos!<br>
               <a href="../View/LoginProdutor.html"><button type="button">Voltar</button></a>';
        $conexao->fechar();
        return;
    }
    $rs = $retorno->fetch_all();

    foreach($rs as $linha) {
        $id = $linha[0];
        $nome = $linha[1];
        $user = $linha[2];
        $pass = $linha[3];
        
    }
    session_start();
    $_SESSION["user"] = $id;
    echo $_SESSION["user"];
    $produtor = new Produtor($id, $nome, $user, $pass, $pass);

    $SQL = "String = ".$produtor->getId().",
                    ".$produtor->getNome()."',
                    '".$produtor->getUsuario()."',
                    '".$produtor->getSenha()."');";
    
    $conexao->fechar();
    header("Location: ../View/TelaInicialProdutor.php"); //Página inicial após login*

    

    
?>
