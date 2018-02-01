<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include_once("Persistence/ProdutorDAO.php");

final class ConsultaIdTest extends TestCase {
    public function testConsultaProdutorPorId() {
        $this->assertTrue(
            ProdutorDAO::senhaIgualConfirmaSenha('123', '123')
        );
    }   
  
}

?>
