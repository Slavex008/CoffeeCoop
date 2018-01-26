<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/Venda.php");
    include_once("../Persistence/VendaDAO.php");
    
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    session_start();
    $idCliente = $_SESSION["user"];
    
    $vendaDao = new VendaDAO();
    $retorno = $vendaDao->buscarVendas($link);
    
    $rs = $retorno->fetch_all();

?>

<html>
    <head>
        <title>CoffeeCoop</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
        
    <div class='telainicial' align='center'>
        <form>
            <h2 align='center'>Sacas em oferta</h2>
            <fieldset>
                <input class='inputbusca' name="tipo" placeholder = "Digite o tipo de café" type = "text" maxlength = "40" required autofocus>
                <button name = "submit" type = "submit" class='btnbusca'>Consultar</button>
            </fieldset>
        
        </form>
    
        <table border = '2' class='tabela' align='center'>
            <tr>
                <th>Tipo</th>
                <th>Data de Armazenamento</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
            <?php
                foreach($rs as $linha){
                    $indice = $linha[0];
                    echo "<tr>";
                    echo "<td>".$linha[1]."</td>";
                    echo "<td>".$linha[2]."</td>";
                    echo "<td>".$linha[3]."</td>";
                    echo "<td>".$linha[4]."</td>";
                    echo "<td><a href='ComprarCafe.php?id=".$indice."'><button name = 'comprar".$indice."' type = 'submit'>Comprar</button></a></td>";
                    
                    echo "</tr>";
                }   
            ?>
        </table>
        <button name = "submit" type = "submit">Voltar</button>

    </div>
    </body>
</html>
