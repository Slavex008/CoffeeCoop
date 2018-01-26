<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Venda.php");

class VendaDAO {

    function cadastrarVenda($venda, $link) {
        $SQL = "INSERT INTO Venda VALUES ('".$venda->getIdSaca()."',
                                            NULL,
                                            '".$venda->getValorPorSaca()."',
                                            0);";

        if (!mysqli_query($link, $SQL)) {
            return ("A saca ja está a venda");
        }
        return "Saca colocada a venda!";
        
    }
    
    
    function buscarVendas($tipo, $link) {
        echo "AQUII";
        $SQL = NULL;
        if($tipo == NULL) {
            $SQL = "SELECT * FROM Venda v
                    JOIN SacaDeCafe s
                    ON v.idSaca = s.id
                    WHERE aguardandoAprovacao = '0';
                    ";
        } else {
            $SQL = "SELECT * FROM Venda v
                    JOIN SacaDeCafe s
                    ON v.idSaca = s.id
                    WHERE s.tipo ='".$tipo."'
                          AND aguardandoAprovacao = '0';
                    ";
        }
        echo $SQL;
        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editarAguardandoAprovacao($idSaca, $idCliente, $aguardandoAprovacao, $link) {
        $SQL = "UPDATE Venda SET idCliente = '".$idCliente."',
                                  aguardandoAprovacao = '".$aguardandoAprovacao."'
                                  WHERE idSaca = '".$idSaca."';";
        $retorno = mysqli_query($link, $SQL);
        $retorno = $SQL;
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
