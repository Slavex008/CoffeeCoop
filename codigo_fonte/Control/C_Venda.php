<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Persistence/Conexao.php");
include_once("../Model/Venda.php");
include_once("../Persistence/VendaDAO.php");
include_once("C_SacaDeCafe.php");
include_once("C_Produtor.php");
    
class C_Venda {
    
    public function cadastraVenda($idSaca) {
        $controllerSaca = new C_SacaDeCafe();
        $saca = $controllerSaca->consultaSacaPorId($idSaca);
        
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $retorno = NULL;
        if($saca != NULL) {
            $venda = new Venda($idSaca, NULL, $saca->getValorPorSaca(), 0, NULL);    
            $vendaDao = new VendaDAO();
            $retorno = $vendaDao->cadastrarVenda($venda, $link);
            
        }
        
        
        if($aguardandoAprovacao == 0) {
            $controllerProd = new C_Produtor();
            $produtor = $controllerProd->consultaProdutorPorId($saca->getIdProdutor());
            if($produtor != NULL) {
                $controllerProd->atualizarAoVender($produtor);
            }
            
        }
        
        
        echo "<p>".$retorno."</p><a href='../View/TelaInicialProdutor.php'><button>OK</button>";
        $conexao->fechar();
        
    }
    
    
    public function consultaVenda($tipo, $tipoUsuario) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $vendaDao = new VendaDAO();
        $retorno = NULL;
        switch ($tipoUsuario) {
            case "c":
                $retorno = $vendaDao->buscarVendas($tipo, $link);
                break;
            case "g":
                $retorno = $vendaDao->buscarComprasPendentes($link);
                break;
        }
        $conexao->fechar();
        return $retorno->fetch_all();
    }
    
    public function editaVenda($idSaca, $idCliente, $aguardandoAprovacao, $date) {
        if($aguardandoAprovacao == 0) {
            $controllerSaca = new C_SacaDeCafe();
            $saca = $controllerSaca->consultaSacaPorId($idSaca);
            
            $controllerProd = new C_Produtor();
            $id = $saca->getIdProdutor();
            $produtor = $controllerProd->consultaProdutorPorId($id);
            if($produtor != NULL) {
                $controllerProd->atualizarAoRecusar($produtor);
                echo "AQUI";
            }
            
        }
        if($aguardandoAprovacao == 1) {
            $controllerSaca = new C_SacaDeCafe();
            $saca = $controllerSaca->consultaSacaPorId($idSaca);
            $controllerProd = new C_Produtor();
            $id = $saca->getIdProdutor();
            $produtor = $controllerProd->consultaProdutorPorId($id);
            if($produtor != NULL) {
                $controllerProd->atualizarAoComprar($produtor);
            }
            
        }
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $vendaDao = new VendaDAO();
        
        echo $vendaDao->editarAguardandoAprovacao($idSaca, $idCliente, $aguardandoAprovacao, $date, $link);
        $conexao->fechar();
        
        header("Location: ../View/TelaInicialCliente.php");
    }
    
    public function removeVenda($id) {
        $controllerSaca = new C_SacaDeCafe();
        $saca = $controllerSaca->consultaSacaPorId($id);
        
        $idProd = $saca->getIdProdutor();
        
        $controllerProd = new C_Produtor();
        $produtor = $controllerProd->consultaProdutorPorId($idProd);
        $controllerProd->atualizarAoConfirmarVenda($produtor);
        echo "AQUI";
        
        $controllerSaca->removeSaca($id);
        
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $vendaDAO = new VendaDAO();
        $vendaDAO->excluirVenda($id, $link);
        $conexao->fechar();
        
        
        header("Location: ../View/TelaInicialGerente.php");
    }
}
?>
