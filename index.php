<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME - SISCONT</title>
</head>
<body>
    <div name="cabecalho">
        <h1>SISCONT - MENU PRINCIPAL</h1>
    </div>

    <div name="corpo">
        <h2>Escolha uma opção:</h2>
        <div name="buttons">
            <form name="consultar" method="POST" action="consulta.php">
                <input type="submit" name="btn_consulta" value="CONSULTA">
            </form>
            <form name="cadastrar" method="POST" action="cadastro.php">
                <input type="submit" name="btn_cadastro" value="CADASTRO">
            </form>
            <form name="editar" method="POST" action="edicao.php">
                <input type="submit" name="btn_edicao" value="EDICAO">
            </form>
        </div>
    </div>
    <div name="rodape">
    </div>
</body>
</html>
<?php
?>