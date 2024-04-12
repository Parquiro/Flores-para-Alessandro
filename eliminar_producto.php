<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$id = $_GET['id'];


$sql = "DELETE FROM inventario WHERE id = $id";

if ($conn->query($sql) === TRUE) {

    header("Location: index.php");
    exit();
} else {
    echo "Error al eliminar el producto: " . $conn->error;
}

$conn->close();
?>
