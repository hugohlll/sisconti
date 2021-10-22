<?php
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONT - CADASTRO COMISSÃO</title>
</head>
<body>
    <div name="cabecalho">
        <h1>CADASTRO COMISSÃO</h1>
    </div>

    <div name="corpo">

    <form name="cadastro" method="POST" action="<?php 
echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	Tipo
	<select name="tipocom">
	<option value="">Selecione um tipo</option>
	<?php
	//query para obter os tipos
	$query = 'SELECT DISTINCT tipocom FROM COMISSOES_INTEGRANTES';
	
	$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
                //$test = $result->fetch_array();
                //print_r($test);
                while(list($tipocom) = $result->fetch_row()){
                    echo "<option value=$tipocom>$tipocom</option>";
                }
	?>
	</select>

	Contrato
	<select name='contrato'>
	<option value="">Selecione um contrato</option>
	<?php
	//query para obter os contratos
		
	//$query = "SELECT idcont, CONCAT(nomeempresa, ' - ',numerocont, '/', omcont, '/', anocont) contrato FROM ID_CONTRATOS ORDER BY nomeempresa, anocont, numerocont;";
	$query = "SELECT idcont, CONCAT(nomeempresa, ' - ', numerocont, '/', omcont, '/', anocont) AS contrato FROM ID_CONTRATOS
	order by nomeempresa, anocont, numerocont;";
	$result0 = $mysqli->query($query,MYSQLI_STORE_RESULT);
                //$test = $result->fetch_array();
                //print_r($test);
	print_r($result0);
	echo $query;
	
                while($row=$result0->fetch_array(MYSQLI_ASSOC))
		{
			//echo "<option value='hugo'>hugo</option>";			
			echo "<option value=" . $row['idcont'] . ">" . $row['contrato'] . "</option>";
                }
	
	?>
	</select>
	<?php
	//obtem idcont
	$idcont=$_POST['contrato'];
		//echo "id contrato:";
		//echo "<br>";
		//echo $idcont;
	?>
		<h2>Integrantes</h2>
		<input type="submit" name="btn_novointeg" value="Novo integrante">
		Militar
		<?php
			//dropdown com os militares
		?>

		Função
        <?php
			//dropdown com as funções
		?>
		<br><br><br>
		<input type="submit" name="btn_consulta" value="FINALIZAR CADASTRO!">
	

		
    
    </form>

    </div>
    <div name="rodape">
    </div>
</body>
</html>

