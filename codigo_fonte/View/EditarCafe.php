<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
    'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>
    <title>Estocar café</title>
    <meta charset = 'UTF-8'>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <link rel = 'stylesheet' href = 'CSS/style.css'>
</head>

<body>
    <div class='formulario'>  
    <form id = 'cadastro' action = '../Control/Editar_Cafe.php' method='post'>
        <h3>Estocar Café</h3>
        <?php
            header('Content-Type: text/html; charset=utf-8');
    
            include_once("../Persistence/Conexao.php");
            include_once("../Model/SacaDeCafe.php");
            include_once("../Persistence/SacaDeCafeDAO.php");
            
            $conexao = new Conexao();
            $link = $conexao->getLink();
            $sacaDAO = new SacaDeCafeDAO();
            
            $id = $_GET["id"];
            $retorno = $sacaDAO->buscarSaca($id, $link);
            
            $rs = $retorno->fetch_all();
            
            $tipo = NULL;
            $dt = NULL;
            $qtd = NULL;
            
            foreach($rs as $linha){
                $tipo = $linha[1];
                $dt = $linha[2];
                $qtd = $linha[3];
            } 
            
            
            echo
            "<fieldset>
                <label> Tipo do café: </label>
                <input name='tipo' value = '".$tipo."' type = 'text' maxlength = '40' required autofocus>
            </fieldset>
            
            <fieldset>
                <label> Quantidade de Café: </label>
                <input name='quantidade' value='".$qtd."' type = 'text' required>
            </fieldset>
            
            <fieldset>
                <label> Data de armazenamento: </label>
                <input name='data' value='".$dt."' type = 'date' required>
            </fieldset>
        
            <fieldset>
                <button name = 'submit' type = 'submit' formaction='../Control/Editar_Cafe.php?id=".$id."'>Editar Café</button>
            </fieldset>";
        ?>
        
        </form>
    </div>
</body>

</html>
