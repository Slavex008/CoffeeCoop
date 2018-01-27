<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/SacaDeCafe.php");

class SacaDeCafeDAO{

    function cadastrar($saca, $link) {
        $SQL = "INSERT INTO SacaDeCafe VALUES ('0','".$saca->getTipo()."',
                                            '".$saca->getDataArmazenamento()."',
                                            '".$saca->getQuantidade()."',
                                            '".$saca->getValorPorSaca()."',
                                            '".$saca->getIdProdutor()."');";

        
        if (!mysqli_query($link, $SQL)) {
            return "Erro na inserção do saca";
        }
        return "Saca cadastrado com sucesso!";
        
    }
    
    
    function buscarSacas($idProdutor, $tipo, $link) {
        $SQL = NULL;
        if($tipo == NULL) {
            $SQL = "SELECT s.id, s.tipo, s.dataArmazenamento,
                    s.quantidade, s.valorPorSaca, s.idProdutor, v.idSaca
                    FROM SacaDeCafe s
                    LEFT JOIN Venda v
                    ON s.id = v.idSaca
                    WHERE idProdutor = '".$idProdutor."' 
                    AND v.idSaca is NULL;";
        } else {
            $SQL = "SELECT s.id, s.tipo, s.dataArmazenamento,
                    s.quantidade, s.valorPorSaca, s.idProdutor, v.idSaca
                    FROM SacaDeCafe s
                    LEFT JOIN Venda v
                    ON s.id = v.idSaca
                    WHERE idProdutor = '".$idProdutor."' 
                    AND v.idSaca is NULL
                    AND tipo = '".$tipo."';";
        }

        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editar($saca, $link) {
        $SQL = "UPDATE SacaDeCafe SET tipo = '".$saca->getTipo()."', 
                                      quantidade = '".$saca->getQuantidade()."',
                                      dataArmazenamento = '".$saca->getDataArmazenamento()."',
                                      valorPorSaca = '".$saca->getValorPorSaca()."'
                                      WHERE id = '".$saca->getId()."';";
        
        if (!mysqli_query($link, $SQL)) {
            return "Erro na edição do saca";
        }
        return "Saca editada com sucesso!";

    }
    
    function buscarSaca($id, $link) {
        $SQL = "SELECT * FROM SacaDeCafe WHERE id = '".$id."';";

        $retorno = mysqli_query($link, $SQL);
        return $retorno;
    }
    
    function excluir($id, $link) {
        $SQL = "DELETE FROM SacaDeCafe WHERE id ='".$id."';";
        echo $SQL."<br>";
        
        if(!mysqli_query($link, $SQL)){
            return ("Erro na exclusão de saca");
        }
        return "Saca deletado com sucesso!";
        
    }
    
}

?>
