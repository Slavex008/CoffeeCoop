<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Persistence/Conexao.php");
    include_once("../Model/SacaDeCafe.php");
    include_once("../Persistence/SacaDeCafeDAO.php");
    
    
    $conexao = new Conexao();
    $link = $conexao->getLink();
    
    session_start();
    $idProdutor = $_SESSION["user"];
    
    $sacaDeCafeDao = new SacaDeCafeDAO();
    $retorno = $sacaDeCafeDao->buscarSacas($idProdutor, $link);
    
    $rs = $retorno->fetch_all();

?>

<html>
    <head>
        <title>CoffeeCoop</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
        
    <div class='telainicial'>
        <form>
            <fieldset>
                <input class='inputbusca' name="tipo" placeholder = "Digite o tipo de café" type = "text" maxlength = "40" required autofocus>
                <button name = "submit" type = "submit" class='btninicial'>Consultar</button>
            </fieldset>
        
        </form>
    
        <table border = '2' class='tabela'>
            <tr>
                <th>Tipo</th>
                <th>Data de Armazenamento</th>
                <th>Quantidade</th>
            </tr>
            <?php
                foreach($rs as $linha){
                    $indice = $linha[0];
                    echo "<tr>";
                    echo "<td>".$linha[1]."</td>";
                    echo "<td>".$linha[2]."</td>";
                    echo "<td>".$linha[3]."</td>";
                    echo "<td><a href='EditarCafe.php?id=".$indice."'><button class='btneditar'name = 'e".$indice."' type = 'submit'>E</button></a></td>";
                    
                    echo "</tr>";
                }   
            ?>
        </table>
        <br><br>
        <a href="EstocarCafe.html"><button name = "submit" type = "submit" class='btninicial'>Inserir</button></a>
        <button name = "submit" type = "submit" class='btninicial'>Retirar</button>
        <button name = "submit" type = "submit" class='btninicial'>Vender</button>

    </div>
    </body>
</html>
