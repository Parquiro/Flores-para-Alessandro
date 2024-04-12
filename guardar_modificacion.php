<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$metros = $_POST['metros'];
$precio_mayor = $_POST['precio_mayor'];
$precio_detal = $_POST['precio_detal'];


$sql = "UPDATE inventario 
        SET nombre = '$nombre', metros = $metros, 
            precio_mayor = $precio_mayor, precio_detal = $precio_detal 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
