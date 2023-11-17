<?php
$conn = mysqli_connect("localhost", "root", "");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$banco = mysqli_select_db($conn, "despesa");


// Create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];

    $sql = "INSERT INTO despesa (descricao, valor, data) VALUES ('$descricao', $valor, '$data')";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa inserida com sucesso";
        header("Location: listarDespesa.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Despesa</title>
</head>
<body>

<h2>Inserir Despesa</h2>


<form action="" method="post">
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" required><br><br>

    <label for="valor">Valor:</label>
    <input type="number" name="valor" step="0.01" required><br><br>

    <label for="data">Data:</label>
    <input type="date" name="data" required><br><br>

    <input type="hidden" name="create" value="1">
    <button type="submit">Inserir</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
