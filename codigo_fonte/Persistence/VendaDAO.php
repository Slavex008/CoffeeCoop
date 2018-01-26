<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Venda.php");

class VendaDAO{

    function cadastrar($venda, $link) {
        $SQL = "INSERT INTO Venda VALUES ('".$venda->getIdSaca()."',
                                            '".$venda->getIdCliente()."',
                                            '".$venda->getValorPorSaca()."',
                                            '".$venda->getAguardandoAprovacao()."');";

        
        if (!mysqli_query($link, $SQL)) {
            die("Erro na inserção do usuário");
        }
        echo "Saca cadastrado com sucesso!";
        
    }
    
    
    function buscarVendas($link) {
        $SQL = "SELECT * FROM Venda";

        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editar($saca, $link) {
        $SQL = "UPDATE SacaDeCafe SET tipo = '".$saca->tipo."', quantidade = '".$saca->quantidade."',
                dataArmazenamento = '".$saca->dataArmazenamento."' WHERE id = '".$saca->id."';";
        $retorno = mysqli_query($link, $SQL);
        $retorno = $SQL;
        return $retorno;
    }
    
    function buscarSaca($id, $link) {
        $SQL = "SELECT * FROM SacaDeCafe WHERE id = '".$id."';";

        $retorno = mysqli_query($link, $SQL);
        return $retorno;
    }
    
    function Excluir($usuario, $link) {
        $SQL = "DELETE FROM Cliente WHERE usuario ='".$cliente->getUsuario()."';";
        echo $SQL."<br>";
        
        if(!mysqli_query($link, $SQL)){
            die("Erro na exclusão de cliente");
        }
        echo "Cliente deletado com sucesso!";
        
    }
    
    function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM Cliente WHERE usuario ='".$usuario."' and senha = '".$senha."';";

        $retorno = mysqli_query($link, $SQL);
        echo $SQL;      
        
        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            //die("Erro na consulta de cliente");
            throw new Exception('usuario ou senha incorretos!');
        }
        
    }
    
}

?>
