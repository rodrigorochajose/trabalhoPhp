<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Despesa</title>
</head>
<body>

<h2>Excluir Despesa</h2>

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

        <p>Confirma excluir a despesa atual?</p>
        <p>ID: <?php echo $row["id"]; ?><br>
           Descrição: <?php echo $row["descricao"]; ?><br>
           Valor: <?php echo $row["valor"]; ?><br>
           Data: <?php echo $row["data"]; ?></p>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="delete" value="1">
            <button type="submit">Excluir</button>
        </form>

<?php
    } else {
        echo "Despesa não encontrada.";
    }
} else {
    echo "ID não foi enviado.";
}

// Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM despesa WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Despesa excluida com sucesso";
        header("Location: listarDespesa.php");
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
