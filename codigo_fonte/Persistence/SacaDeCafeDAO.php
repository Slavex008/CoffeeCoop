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
            die("Erro na inserção do usuário");
        }
        echo "Saca cadastrado com sucesso!";
        
    }
    
    
    function buscarSacas($idProdutor, $link) {
        $SQL = "SELECT * FROM SacaDeCafe WHERE idProdutor = '".$idProdutor."';";

        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editar($saca, $link) {
        $SQL = "UPDATE SacaDeCafe SET tipo = '".$saca->getTipo()."', 
                                      quantidade = '".$saca->getQuantidade()."',
                                      dataArmazenamento = '".$saca->getDataArmazenamento()."',
                                      valorPorSaca = '".$saca->getValorPorSaca()."'
                                      WHERE id = '".$saca->getId()."';";
        $retorno = mysqli_query($link, $SQL);
        $retorno = $SQL;
        return $retorno;
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
            die("Erro na exclusão de cliente");
        }
        echo "Cliente deletado com sucesso!";
        
    }
    
}

?>
