<!-- read.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Despesas</title>
</head>
<body>

<h2>Despesas</h2>

<button onClick="window.location.href ='menu.php'">Voltar</button>
<br><br>
<?php
$conn = mysqli_connect("localhost", "root", "");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$banco = mysqli_select_db($conn, "despesa");


$sql = "SELECT * FROM despesa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Descrição: " . $row["descricao"] . " - Valor: " . $row["valor"] . " - Data: " . $row["data"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
