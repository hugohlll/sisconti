<?php
session_start();
include "conexao.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA</title>
</head>
<body>
    <h1>Página de Consulta</h1>
</body>
</html>
<?php
$tipo=$_POST['tipo_com'];
$contrato=$_POST['contrato'];

//query para obter idcom a partir de $tipo e $contrato
$qidcom = "SELECT idcom FROM `IDCOM_INTEG`
WHERE tipo='$tipo' AND contrato='$contrato';";

$result0 = $mysqli->query($qidcom,MYSQLI_STORE_RESULT);
$row = $result0->fetch_array(MYSQLI_ASSOC);
$idcom = $row['idcom'];

//query para portaria e boletim
$qpb="SELECT idcom, CONCAT(portaria_num,'/ACI, de ', DATE_FORMAT(portaria_data, '%d/%m/%Y')) portaria,
 CONCAT(bol_num,', de ', date_format(bol_data,'%d/%m/%Y')) boletim, DATE_FORMAT(vigencia_fim, '%d/%m/%Y') vigencia
FROM comissoes WHERE idcom='$idcom';";
$result1 = $mysqli->query($qpb,MYSQLI_STORE_RESULT);

//query para integrantes
$qint="SELECT idcom, concat(nomepg, ' ', nomegr) militar, nomefuncao funcao FROM COMISSOES_INTEGRANTES WHERE idcom=$idcom
order by idcom, idfuncao;";
$result2 = $mysqli->query($qint,MYSQLI_STORE_RESULT);
?>

<!--tabela com os resultados-->
<table align="center">
    <tr>
        <th colspan="2">COMISSÃO DE <?php
            echo "<strong>";
            echo $tipo;
            echo "</strong>";?>
        </th>
    </tr>
    <tr>
        <th colspan="2">CONTRATO <?php echo "<strong>" . $contrato . "</strong>";?></th>
    </tr>
</table>
<table align="center">
    <tr>
        <td>Portaria</td>
        <td>Boletim</td>
        <td>Vigência</td>
    </tr>
    <?php
        $row = $result1->fetch_array(MYSQLI_ASSOC); 
        $portaria = $row['portaria']; 
        $boletim = $row['boletim'];
        $vigencia = $row['vigencia'];
        
        echo "<tr>";
        echo "<td>" . $portaria . "</td>";
        echo "<td>" . $boletim . "</td>";
        echo "<td>" . $vigencia . "</td>";
        echo "</tr>";
    ?>
</table>
<table align="center" border="1">
    <?php
        echo "<tr>";
        echo "<td>MILITAR</td>";
        echo "<td>FUNÇÃO</td>";
        echo "</tr>";
        
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) 
        {   
            $militar = $row['militar']; 
            $funcao = $row['funcao'];
            echo "<tr>";
            echo "<td>" . $militar . "</td>";
            echo "<td>" . $funcao . "</td>";
            echo "</tr>";
        }

    
    ?>
</table>