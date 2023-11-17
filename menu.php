<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
</head>
<body>

<h1>Despesas</h1>

<a href="cadastrarDespesa.php"><button>Inserir Despesa</button></a>
<br><br>
<a href="listarDespesa.php"><button>Ver Despesas</button></a>
<br><br>

<form action="atualizarDespesa.php" method="get">
    <label for="id">Editar Despesa (ID):</label>
    <input type="text" name="id" required>
    <button type="submit">Editar</button>
</form>
<br>
<form action="deletarDespesa.php" method="get">
    <label for="id">Excluir Despesa (ID):</label>
    <input type="text" name="id" required>
    <button type="submit">Excluir</button>
</form>

</body>
</html>
