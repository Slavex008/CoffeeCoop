<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Produtor.php");

class ProdutorDAO{

    
    public function cadastrar($produtor, $link, $confirmaSenha) {
        if(strcmp($produtor->getSenha(), $confirmaSenha) != 0) {
            return -2;
        }
        
        $SQL = "INSERT INTO Produtor VALUES ('0','".$produtor->getNome()."',
                                            '".$produtor->getUsuario()."',
                                            '".$produtor->getSenha()."');";
                                            
        if (!mysqli_query($link, $SQL)) {
            return -1;
        }
        
        return 0;
        
    }
    
    public function excluir($produtor, $link) {
        $SQL = "DELETE FROM Produtor WHERE usuario ='".$produtor->getUsuario()."';";
        
        if(!mysqli_query($link, $SQL)){
            return ("Erro na exclusão de Produtor");
        }
        return "Produtor deletado com sucesso!";
        
    }
    
    public function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM Produtor WHERE usuario ='".$usuario."' and senha = '".$senha."';";

        $retorno = mysqli_query($link, $SQL);

        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
}

?>
