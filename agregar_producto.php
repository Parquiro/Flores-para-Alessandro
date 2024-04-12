<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$metros = $_POST['metros'];
$precio_mayor = $_POST['precio_mayor'];
$precio_detal = $_POST['precio_detal'];


$sql_verificar = "SELECT * FROM inventario WHERE codigo = '$codigo'";
$result_verificar = $conn->query($sql_verificar);
if ($result_verificar->num_rows > 0) {
    
    echo "<script>alert('Ya existe un producto con el mismo código.'); window.location.href = 'index.php';</script>";
} else {
    
    $sql_insertar = "INSERT INTO inventario (codigo, nombre, metros, precio_mayor, precio_detal) 
                     VALUES ('$codigo', '$nombre', $metros, $precio_mayor, $precio_detal)";

    if ($conn->query($sql_insertar) === TRUE) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}
$conn->close();
?>
