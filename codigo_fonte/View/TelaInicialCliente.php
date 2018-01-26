<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Model/Venda.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    include_once("../Persistence/VendaDAO.php");
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    $tipo = $_POST["inputbusca"];
    session_start();
    $idCliente = $_SESSION["user"];
    
    $vendaDao = new VendaDAO();
    //echo $vendaDao->buscarVendas()->fetch_all();
    $retorno = $vendaDao->buscarVendas($tipo, $link);
    
    $rs = $retorno->fetch_all();

?>

<html>
    <head>
        <title>CoffeeCoop</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
    <div class='telainicial'>
        <h1>Sacas em Oferta</h1>
        <form action='../View/TelaInicialCliente.php' method="post">
            <fieldset>
                <?php
                    echo "<input class='inputbusca' name='inputbusca' placeholder = 'Digite o tipo de café' type = 'text' maxlength = '40' autofocus value='".$tipo."'>"
                ?>
                <button name = "buscaTipo" type = "submit" class='btninicial'>Consultar</button>
            </fieldset>
        </form>
        <form>
    
            <table border = '2' class='tabela'>
                <tr>
                    <th class='cabecalhoinicial'>Tipo</th>
                    <th class='cabecalhoinicial'>Data de Armazenamento</th>
                    <th class='cabecalhoinicial'>Quantidade</th>
                    <th class='cabecalhoinicial'>Valor Total</th>
                </tr>
                <?php
                    foreach($rs as $linha){
                        $indice = $linha[0];
                        $data = explode("-", $linha[6], 3);
                        echo "<tr>";
                        echo "<td>".$linha[5]."</td>";
                        echo "<td>".$data[2]."/".$data[1]."/".$data[0]."</td>";
                        echo "<td>".$linha[7]."</td>";
                        echo "<td>".($linha[7]*$linha[8])."</td>";
                        echo "<td class='botaotabela'><a href='../Control/Editar_Venda.php?id=".$indice."' title='Comprar'><button class='btneditar' name='c".$indice."' type='button'>C</button></a></td>";
                        echo "</tr>";
                    }   
                ?>
            </table>
        </form>
        <br><br>
        <div>
            <a href="../Control/Logout.php"><button name = "submit" type = "submit" class='btninicial'>Sair</button></a>
        </div>
    </div>
    
    </body>
</html>

