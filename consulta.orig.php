<?php
//session_start();
//session_destroy();
//session_unset();
header("Content-type: text/html; charset=utf-8");

include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA COMISSOES</title>
</head>
<body>
    <h1>CONSULTA COMISSÃO</h1>
    <form method="POST" action="res_consulta.php">
        <label>Digite a comissao</label>
        <select name="tipo_com">
            <?php
                $query = 'SELECT DISTINCT tipocom FROM COMISSOES_INTEGRANTES';
                $result = $mysqli->query($query,MYSQLI_STORE_RESULT);
                //$test = $result->fetch_array();
                //print_r($test);
                while(list($tipocom) = $result->fetch_row()){
                    echo "<option value=$tipocom>$tipocom</option>";
                }

            ?>
        </select>

        <br>
        <br>
        <label>Digite o contrato</label>
        <select name="contrato">
            <?php
                $query = "SELECT DISTINCT CONCAT(nomeempresa,' - ',numerocont,'/',omcont,'/',anocont) AS contrato FROM COMISSOES_INTEGRANTES";
                $result = $mysqli->query($query,MYSQLI_STORE_RESULT);
                //$test = $result->fetch_array();
                //print_r($test);
                while(list($contrato) = $result->fetch_row()){
                    echo "<option value='$contrato'>$contrato</option>";
                }
            ?>
        </select>

        <br>
        <br>
        <input type="submit" name="submit" value="Ok!">
    </form>
</body>
</html>