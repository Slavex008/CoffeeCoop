<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Control/C_SacaDeCafe.php");
    
    $tipo = NULL;
    if(isset($_POST['inputbusca'])) {
        $tipo = $_POST["inputbusca"];
    }
    
    $controller = new C_SacaDeCafe();
    
    $rs = $controller->consultaSaca($tipo);
    
?>


<html>
    <head>
        <title>CoffeeCoop</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
    <div class='telainicial'>
        <h1>Minhas Sacas</h1>
        <form action='../View/TelaInicialProdutor.php' method="post">
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
                    <th class='cabecalhoinicial'>Valor Por Saca</th>
                </tr>
                <?php
                    foreach($rs as $linha){
                        $indice = $linha[0];
                        $data = explode("-", $linha[2], 3);
                        echo "<tr>";
                        echo "<td>".$linha[1]."</td>";
                        echo "<td>".$data[2]."/".$data[1]."/".$data[0]."</td>";
                        echo "<td>".$linha[3]."</td>";
                        echo "<td>".$linha[4]."</td>";
                        echo "<td class='botaotabela'><a href='EditarCafe.php?id=".$indice."' title='Editar'><button class='btneditar' name='e".$indice."' type='button'>E</button></a></td>";
                        echo "<td class='botaotabela'><a href='../Control/Remover_Saca.php?id=".$indice."' title='Remover'><button class='btneditar' name = 'r".$indice."' type='button'>R</button></a></td>";
                        echo "<td class='botaotabela'><a href='../Control/Venda_Cad.php?id=".$indice."' title='Vender'><button class='btneditar' name = 'v".$indice."' type='button'>V</button></a></td>";
                        echo "</tr>";
                        
                    }   
                ?>
            </table>
        </form>
        <br><br>
        <a href="EstocarCafe.html"><button name = "submit" type = "submit" class='btninicial'>Inserir</button></a>
        <div>
            <a href="TelaQuantidadesProdutor.php"><button name = "submit" type = "button" class='btninicial'>Vendas</button></a>
        </div>
        <div>
            <a href="../Control/Logout.php"><button name = "submit" type = "submit" class='btninicial'>Sair</button></a>
        </div>
    </div>
    
    </body>
</html>

