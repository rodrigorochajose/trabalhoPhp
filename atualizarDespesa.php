<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Despesa</title>
</head>
<body>

<h2>Atualizar Despesa</h2>

<?php


$conn = mysqli_connect("localhost", "root", "");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$banco = mysqli_select_db($conn, "despesa");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM despesa WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

        <form action="" method="post">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $row['descricao']; ?>" required><br><br>


            <label for="valor">Valor:</label>
            <input type="number" name="valor" value="<?php echo $row['valor']; ?>" step="0.01" required><br><br>


            <label for="data">Data:</label>
            <input type="date" name="data" value="<?php echo $row['data']; ?>" required><br><br>


            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="update" value="1">
            <button type="submit">Atualizar</button>
        </form>

<?php
    } else {
        echo "Despesa não encontrada.";
    }
} else {
    echo "ID não fornecido.";
}

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];

    $sql = "UPDATE despesa SET descricao='$descricao', valor=$valor, data='$data' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa atualizada com sucesso.";
        header("Location: listarDespesa.php");
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
