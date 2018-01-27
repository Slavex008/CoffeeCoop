<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Venda.php");

class VendaDAO {

    function cadastrarVenda($venda, $link) {
        $SQL = "INSERT INTO Venda VALUES ('".$venda->getIdSaca()."',
                                            NULL,
                                            '".$venda->getValorPorSaca()."',
                                            0, 
                                            NULL);";

        if (!mysqli_query($link, $SQL)) {
            return "Erro! Pode ser que a saca ja está a venda";
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
        
        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editarAguardandoAprovacao($idSaca, $idCliente, $aguardandoAprovacao, $dataCompra, $link) {
        if($idCliente != NULL) {
            $idCliente = "'".$idCliente."'";
            $dataCompra = "'".$dataCompra."'";
        } else {
            $idCliente = 'NULL';
            $dataCompra = 'NULL';
        }
        $SQL = "UPDATE Venda SET idCliente = ".$idCliente.",
                                 aguardandoAprovacao = '".$aguardandoAprovacao."',
                                 dataCompra = ".$dataCompra."
                                 WHERE idSaca = '".$idSaca."';";
        
        if (!mysqli_query($link, $SQL)) {
            return "Saca nao editada";
        }
        return "Saca editada!";
    }
    
    function buscarComprasPendentes($link) {
    
        $SQL = "SELECT v.idSaca, c.nome as cNome, p.nome as pNome, s.valorPorSaca, s.quantidade, v.dataCompra  FROM Venda v
                JOIN SacaDeCafe s
                ON v.idSaca = s.id
                JOIN Cliente c
                ON v.idCliente = c.id
                JOIN Produtor p
                ON s.idProdutor = p.id
                WHERE aguardandoAprovacao = '1';
                ";
    
        echo $SQL;
        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function excluirVenda($id, $link) {
        $SQL = "DELETE FROM Venda WHERE idSaca ='".$id."';";

        echo $SQL."<br>";
        if(!mysqli_query($link, $SQL)){
            return "Erro na exclusão de vendas";
        }
        return "Venda deletado com sucesso!";
        
    }
    
}

?>
