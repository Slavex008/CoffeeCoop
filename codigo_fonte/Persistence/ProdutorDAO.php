<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Produtor.php");

class ProdutorDAO{

    
    public function cadastrar($produtor, $link, $confirmaSenha) {
        if(strcmp($produtor->getSenha(), $confirmaSenha) != 0) {
            return -2;
        }
        
        $SQL = "INSERT INTO produtor VALUES ('0','".$produtor->getNome()."',
                                            '".$produtor->getUsuario()."',
                                            '".$produtor->getSenha().",
                                            0, 0, 0');";
                                            
        if (!mysqli_query($link, $SQL)) {
            return -1;
        }
        
        return 0;
        
    }
    
    public function excluir($produtor, $link) {
        $SQL = "DELETE FROM produtor WHERE usuario ='".$produtor->getUsuario()."';";
        
        if(!mysqli_query($link, $SQL)){
            return ("Erro na exclusão de Produtor");
        }
        return "Produtor deletado com sucesso!";
        
    }
    
    public function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM produtor WHERE usuario ='".$usuario."' and senha = '".$senha."';";
        echo $SQL."<br>";
        $retorno = mysqli_query($link, $SQL);

        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
}

?>
